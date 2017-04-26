<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class KelasController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // Grab all the kelas
        $kelas = Kelas::All();
        $iduser = Auth::id();
        //dd($kelas);
        // Show the page
        return View('admin.siswa.kelas', compact('kelas', 'iduser'));
    }

    public function delete($id_kelas) 
    {
    	Kelas::where('id_kelas', $id_kelas)->delete();
    }
}
