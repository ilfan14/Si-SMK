<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Mapel;
use App\User;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Grab all the kelas
        $mapel = Mapel::all();
        $iduser = Auth::id();
        // dd($mapel);
        // Show the page
        return View('admin.siswa.datanilai', compact('mapel', 'iduser'));
    }

    public function create(UserRequest $request)
    {


        $tambahmapel = new Mapel;
        $tambahmapel->kode_mapel = $request->get('kodemapel');
        $tambahmapel->nama_mapel = $request->get('namamapel');
        $tambahmapel->save();

        echo "work";
    }
}
