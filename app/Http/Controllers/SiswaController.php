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


    public function edit(UserRequest $request)
    {

        $oldnik = $request->get('niklama');
        $oldkelas = $request->get('kellama');

        $editsiswa = User::where('username', $oldnik)->first();
        $editsiswa->username = $request->get('nomorinduk');
        $editsiswa->name = $request->get('namasiswa');
        $editsiswa->gender = $request->get('gender');
        $editsiswa->alamat = $request->get('alamat');
        $editsiswa->save();

        $editkelas = Kelas::where('nama_kelas', $oldkelas)->first();
        if ($oldkelas == $request->get('kelas'))
        {
            // nothing abaikan update kelas
        } else {
            // update kelas 
            $idkelas = DB::table('kelas')->select('id_kelas')->where('nama_kelas', $request->get('kelas'))->get();
            foreach ($idkelas as $key => $value) {
                $kelasid = $value->id_kelas;
            }
            $oldidkelas = DB::table('kelas')->select('id_kelas')->where('nama_kelas', $request->get('kellama'))->get();
            foreach ($oldidkelas as $key => $value) {
                $oldkelasid = $value->id_kelas;
            }
            $idsiswa = User::where('username', $request->get('nomorinduk'))->get();
            foreach ($idsiswa as $key => $value) {
                $siswaid = $value->id;
            }

            
            if (!isset($oldkelas)){
                $tambahrombel = New Rombel;
                $tambahrombel->user_id = $siswaid;
                $tambahrombel->id_kelas = $kelasid;
                $tambahrombel->save();
            } else {
                DB::table('rombel')->where('user_id', $siswaid)->update(['id_kelas' => $kelasid]);
            }            
        }

        echo "work";
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
