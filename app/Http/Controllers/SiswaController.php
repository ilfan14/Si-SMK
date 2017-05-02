<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Kelas;
use App\Rombel;
use App\User;
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
        					->where('users.job', '=', 'siswa')
        					->get();
         // $siswa = User::where('job', 'siswa')->hasOne('Rombel');
        // $siswa = User::All();
        $iduser = Auth::id();
        // dd($siswa);
        // Show the page
        return View('admin.siswa.siswa', compact('siswa', 'iduser'));
    }



    public function create(UserRequest $request)
    {

        $tambahsiswa = new User;

        $tambahsiswa->username = $request->get('nomorinduk');
        $tambahsiswa->name = $request->get('namasiswa');
        $tambahsiswa->job = 'siswa';
        $tambahsiswa->status = 'aktif';
        $tambahsiswa->password = bcrypt('1234');
        $tambahsiswa->email = $request->get('nomorinduk') . '@email.com';
        $tambahsiswa->gender = $request->get('gender');
        $tambahsiswa->alamat = $request->get('alamat');
        $tambahsiswa->save();

        $idkelas = DB::table('kelas')->select('id_kelas')->where('nama_kelas', $request->get('kelas'))->get();
        foreach ($idkelas as $key => $value) {
            $kelasid = $value->id_kelas;
        }
        $idsiswa = User::where('username', $request->get('nomorinduk'))->get();
        foreach ($idsiswa as $key => $value) {
            $siswaid = $value->id;
        }
        $tambahrombel = new Rombel;
        $tambahrombel->id_kelas = $kelasid;
        $tambahrombel->user_id = $siswaid;
        $tambahrombel->save();

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
        User::where('username', $niksiswa)->delete();
    }
}
