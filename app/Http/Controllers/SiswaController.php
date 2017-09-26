<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Kelas;
use App\Rombel;
use App\User;
Use App\data_pengguna;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Validator;

class SiswaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Grab all the kelas
        $siswa = DB::table('users')
        					->leftjoin('rombel','rombel.user_id', '=', 'users.id')
        					->leftjoin('kelas','kelas.id_kelas','=','rombel.id_kelas')
                            ->leftjoin('data_pengguna','data_pengguna.id', '=', 'users.data_pengguna_id')
        					->where('users.job', '=', 'siswa')
                            ->select('users.id', 'users.username', 'users.name', 'users.gender', 'data_pengguna.alamat', 'kelas.nama_kelas')
        					->get();
        // $siswa = User::where('job', 'siswa')->hasOne('Rombel');
        // $siswa = User::All();
        $iduser = Auth::id();
        // dd($siswa);
        // Show the page
        return View('admin.siswa.siswa', compact('siswa', 'iduser'));
    }



    public function addsiswa()
    {
        try {
            $iduser = Auth::id();
            $kelas = Kelas::All();
            $listkelas = $kelas->pluck('nama_kelas','id_kelas');
            // dd($listkelas);

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        return View('admin.siswa.tambahsiswa', compact('iduser', 'listkelas'));
    }


    public function create(UserRequest $request)
    {



        // Store the blog post...

        $adduser = new User;
        $adduser->username     = $request->input('iusername');
        $adduser->password     = bcrypt($request->input('ipassword'));
        $adduser->job     = 'Siswa';
        $adduser->status     = $request->input('istatus');
        $adduser->name     = $request->input('inama');
        $adduser->gender       = $request->input('ijeniskelamin');
        $adduser->email        = $request->input('iemail');
        $adduser->save();

        
        // data selain ortu
        $datapengguna = new data_pengguna([
            'alamat' => $request->input('ialamat'),
            'tempat_lahir' => $request->input('itempatlahir'),
            'tanggal_lahir' => $request->input('itanggallahir'),
            'no_hp' => $request->input('inohp'),
        ]);

        // create datapengguna relasi dengan user
        $datapengguna->save();
        $relasdatapenggunauser = User::find($adduser->id);
        $relasdatapenggunauser->datapengguna()->associate($datapengguna);
        $relasdatapenggunauser->save();

        // add role to new user Siswa
        $adduser->attachRole(3);

        $tambahrombel = new Rombel;
        $tambahrombel->id_kelas =  $request->input('kelas');
        $tambahrombel->user_id = $adduser->id;
        $tambahrombel->save();
       

        return Redirect::route('listsiswa')->with('status', 'Siswa Berhasil ditambah');

        // echo "Work";
    }

    public function updatesiswa($id)
    {
        try {
            $iduser = Auth::id();
            // Get the user information
            $user = User::find($id);
            $kelas = Kelas::All();
            $listkelas = $kelas->pluck('nama_kelas','id_kelas');
            $datapengguna = $user->datapengguna;
            $idkelas = Rombel::where('user_id', $user->id)->first();


        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        return View('admin.siswa.updatesiswa', compact('user','iduser', 'datapengguna','listkelas', 'idkelas'));
    }


    public function edit(UserRequest $request)
    {

      
        $editsiswa = User::find($request->input('idsiswa'));
        $editsiswa->username = $request->input('iusername');
        $editsiswa->name = $request->input('inama');
        $editsiswa->gender = $request->input('ijeniskelamin');
        if ($request->input('ipassword') == null) {
            // do nothing
        } else
        {
            $editsiswa->password     = bcrypt($request->input('ipassword'));

        }
        $editsiswa->status     = $request->input('istatus');
        $editsiswa->email        = $request->input('iemail');
        $editsiswa->save();

         // update selain orang tua
        $datapengguna = data_pengguna::find($editsiswa->data_pengguna_id);
        $datapengguna->tempat_lahir     = $request->input('itempatlahir');
        $datapengguna->tanggal_lahir    = $request->input('itanggallahir');
        $datapengguna->alamat          = $request->input('ialamat');
        $datapengguna->no_hp            = $request->input('inohp');
        $datapengguna->save();

        $updatekelas = Rombel::where('user_id', '=', $editsiswa->id)->first();
        $updatekelas->id_kelas = $request->input('kelas');
        $updatekelas->save();
        // dd($updatekelas);

        return Redirect::route('listsiswa')->with('status', 'Siswa Berhasil Diubah');
    }



    public function delete($niksiswa) 
    {
        $delete = User::where('username', $niksiswa)->first();
        $delete->delete();

        $hdata = data_pengguna::find($delete->data_pengguna_id);
        $hdata->delete();
    }


    public function searchsiswa(){
        $hasilsearch = DB::table('users')
                            ->leftjoin('rombel','rombel.user_id', '=', 'users.id')
                            ->leftjoin('kelas','kelas.id_kelas','=','rombel.id_kelas')
                            ->where('users.job', '=', 'siswa')
                            ->get(['users.id', 'users.name', 'kelas.nama_kelas']);
         // $siswa = User::where('job', 'siswa')->hasOne('Rombel');
        // $siswa = User::All();
        return $hasilsearch;
    }
}
