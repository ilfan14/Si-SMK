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
        $siswa = DB::table('users')
                            ->leftjoin('rombel','rombel.user_id', '=', 'users.id')
                            ->leftjoin('kelas','kelas.id_kelas','=','rombel.id_kelas')
                            ->where('users.job', '=', 'siswa')
                            ->select('id','username', 'name', 'nama_kelas', 'gender')
                            ->get();

        // $siswa = User::where('job','siswa')->get();
        return response()->json(['data' => $siswa]);
    }

    public function onlynilai($id)
    {
        $nilai = Nilai::where('user_id', $id)->get();
        return response()->json($nilai);
    }
}
