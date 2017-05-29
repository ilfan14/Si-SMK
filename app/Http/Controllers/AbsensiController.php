<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Kelas;
use App\Rombel;
use App\User;
use App\Nilai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;


class AbsensiController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iduser = Auth::id();
        return View('admin.siswa.absensi', compact('iduser'));
    }

    public function absenkelas(UserRequest $request){

        $iduser = Auth::id();
        $kelassiswa = Db::table('kelas')->select('id_kelas')->where('nama_kelas',$request->get('listkelas'))->first();

        $siswa = DB::table('users')
                            ->leftjoin('rombel','rombel.user_id', '=', 'users.id')
                            ->where('rombel.id_kelas', '=', $kelassiswa->id_kelas)
                            ->select('id','username', 'name', 'gender', 'agama')
                            ->get();

        return View('admin.siswa.absenkelas', compact('siswa', 'iduser'));
    }


}
