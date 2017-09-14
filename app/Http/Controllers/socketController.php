<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use LRedis;


class socketController extends Controller
{
    //

    public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		 $iduser = Auth::id();
        // dd($siswa);
        // Show the page
        return View('socket', compact('iduser'));
	}
	public function writemessage()
	{
		$iduser = Auth::id();

        return View('socket', compact('iduser'));
	}
	public function sendMessage(){
		$redis = LRedis::connection();
		$redis->publish('message', Request::input('message'));
		return redirect('home/chat');
	}
}
