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

class NilaiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iduser = Auth::id();
        return View('admin.siswa.lihatnilai', compact('iduser'));
    }

    public function siswawithnilai()
    {
        // Grab all the kelas
        //$siswa = User::where('job', 'siswa')->select('id', 'username', 'job', 'name')->get();
        // $siswa = DB::table('users')
        //                     ->leftjoin('nilai','nilai.user_id', '=', 'users.id')
        //                     ->leftjoin('mapel','mapel.kode_mapel','=','nilai.kode_mapel')
        //                     ->where('users.job', '=', 'siswa')
        //                     ->get();

        $siswa = User::where('job','siswa')->get();
        return response()->json(['data' => $siswa]);
    }

    public function onlynilai($id)
    {
        $nilai = Nilai::where('user_id', $id)->get();
        return response()->json($nilai);
    }
}
