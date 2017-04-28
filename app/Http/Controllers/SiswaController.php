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
}
