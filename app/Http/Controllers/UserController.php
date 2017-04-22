<?php

namespace App\Http\Controllers;

use Illuminate\Http\UserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // Grab all the users
        $users = User::All();
        $iduser = Auth::id();
        // Show the page
        return View('admin.users.index', compact('users', 'iduser'));
    }


     public function show($id)
    {
        try {
        	$iduser = Auth::id();
            // Get the user information
            $user = User::find($id);

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

       
        //dd($user);
        // Show the page
        return View('admin.users.show', compact('user','iduser'));

    }

    public function passwordreset()
    {
        if (Request::ajax()) {
            $data = Request::all();
            $user = Auth::user();
            $password = Request::get('password');
            $user->password = bcrypt($password);
            $user->save();
        }

    }


}
