<?php

namespace App\Http\Controllers;
Use App\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = Auth::user();
        $iduser = Auth::id();

         // Grab all the users
        $info = Informasi::where('untuk','Pengguna')
                       ->orderBy('created_at', 'desc')
                       ->take(4)
                       ->get();


        return view('dashboard', compact('users','iduser','info'));
    }
}
