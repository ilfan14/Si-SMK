<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\User;
use App\data_pengguna;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use File;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // Grab all the users
        $users = User::where('job', '!=', 'Siswa' )->get();
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
            // $user = DB::table('users')
            //                 ->leftjoin('data_pengguna','data_pengguna.id', '=', 'users.data_pengguna_id')
            //                 ->where('users.id', '=', $id)
            //                 ->select('users.id','username', 'name', 'gender', 'email', 'picture', 'created_at', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'nama_ortu_wali', 'no_hp_ortu')
            //                 ->get();

            $datapengguna = User::find($id)->datapengguna;

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

    
        // dd($user);
        // Show the page
        return View('admin.users.show', compact('user','iduser', 'datapengguna'));

    }

    public function changeimage(UserRequest $request){
    	$user = Auth::user();
    	if ($file = $request->file('pic')) {
	        $extension = $file->getClientOriginalExtension() ?: 'png';
	        $folderName = '/uploads/users/';
	        $destinationPath = public_path() . $folderName;
	        $safeName = str_random(10) . '.' . $extension;
	        $file->move($destinationPath, $safeName);
	        //delete old pic if exists
	        if (File::exists(public_path() . $folderName . $user->picture)) {
	            File::delete(public_path() . $folderName . $user->picture);
	        }

	        //save new file path into db
	        $user->picture = $safeName;

	    }
	    //save record
	    $user->update();

	    return back();

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

    public function editprofile()
    {

        try {
            $iduser = Auth::id();

            // Get the user information
            $user = User::find($iduser);

            $datapengguna = User::find($iduser)->datapengguna;

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        return View('admin.users.EditProfile', compact('user','iduser', 'datapengguna'));
    }

    public function goupdateprofile($id)
    {

        try {
            $iduser = Auth::id();

            // Get the user information
            $user = User::find($id);

            $datapengguna = $user->datapengguna;

            if ($user->job == 'Orang Tua') {
                $siswa = User::where([['job', '=', 'siswa'], ['data_pengguna_id', '=', $datapengguna->id]])->first();

            }


        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        return View('admin.users.update', compact('user','iduser', 'datapengguna','siswa'));
    }

    public function updateprofile(UserRequest $request, $id)
    {

        if ($request->input('tipeform') == 'editprofile')
        {
            $user = User::find($id);
            $user->name     = $request->input('inama');
            $user->gender       = $request->input('ijeniskelamin');
            $user->email        = $request->input('iemail');
            $user->save();
                
            if ($user->job == 'Orang Tua'){
                // update untuk orang tua
                $datapengguna = data_pengguna::find($user->data_pengguna_id);
                $datapengguna->tempat_lahir_ortu     = $request->input('itempatlahir');
                $datapengguna->tanggal_lahir_ortu    = $request->input('itanggallahir');
                $datapengguna->alamat_ortu          = $request->input('ialamat');
                $datapengguna->no_hp_ortu            = $request->input('inohp');
            } else {
                // update selain orang tua
                $datapengguna = data_pengguna::find($user->data_pengguna_id);
                $datapengguna->tempat_lahir     = $request->input('itempatlahir');
                $datapengguna->tanggal_lahir    = $request->input('itanggallahir');
                $datapengguna->alamat          = $request->input('ialamat');
                $datapengguna->no_hp            = $request->input('inohp');
            }
            
            $datapengguna->save();

            return Redirect::route('users.show', $id)->with('status', 'Profil Berhasil di Ubah');
        } elseif ($request->input('tipeform') == 'updateprofile') {
            // dd("update profile");
            $updateuser = User::find($id);
            $oldjob = $updateuser->job;
            $updateuser->username     = $request->input('iusername');
            if ($request->input('ipassword') == null){
                // do nothing no update password
            } else {
                $updateuser->password     = bcrypt($request->input('ipassword'));
            }
            $updateuser->job     = $request->input('ijabatan');
            $updateuser->data_pengguna_id = $request->input('listsiswa');
            $updateuser->status     = $request->input('istatus');
            $updateuser->name     = $request->input('inama');
            $updateuser->gender       = $request->input('ijeniskelamin');
            $updateuser->email        = $request->input('iemail');
            $updateuser->save();

            if ($oldjob == $updateuser->job ) {
                $datapengguna = data_pengguna::find($updateuser->data_pengguna_id);
            
                // jika orang tua
                if ($updateuser->job == 'Orang Tua')
                {
                    // update data ke orang tua
                    $datapengguna->no_hp_ortu       = $request->input('inohp');
                    $datapengguna->alamat_ortu      = $request->input('ialamat');
                    $datapengguna->tempat_lahir_ortu     = $request->input('itempatlahir');
                    $datapengguna->tanggal_lahir_ortu    = $request->input('itanggallahir');


                } else {
                    $datapengguna->no_hp        = $request->input('inohp');
                    $datapengguna->alamat       = $request->input('ialamat');
                    $datapengguna->tempat_lahir     = $request->input('itempatlahir');
                    $datapengguna->tanggal_lahir    = $request->input('itanggallahir');
                }

            } elseif ($oldjob == 'Orang Tua') {
                $datapengguna = new data_pengguna;
                $datapengguna->no_hp        = $request->input('inohp');
                $datapengguna->alamat       = $request->input('ialamat');
                $datapengguna->tempat_lahir     = $request->input('itempatlahir');
                $datapengguna->tanggal_lahir    = $request->input('itanggallahir');
            } else {
                $datapengguna = data_pengguna::find($updateuser->data_pengguna_id);
                $datapengguna->no_hp        = $request->input('inohp');
                $datapengguna->alamat       = $request->input('ialamat');
                $datapengguna->tempat_lahir     = $request->input('itempatlahir');
                $datapengguna->tanggal_lahir    = $request->input('itanggallahir');
            }
            
            
            $datapengguna->save();

            return Redirect::route('users')->with('status', 'Profile Berhasil diubah');
        }
        
    }


   public function adduser()
   {
        try {
            $iduser = Auth::id();
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        return View('admin.users.tambahuser', compact('iduser'));
   }

   public function createuser(UserRequest $request)
   {
        $adduser = new User;
        $adduser->username     = $request->input('iusername');
        $adduser->password     = bcrypt($request->input('ipassword'));
        $adduser->job     = $request->input('ijabatan');
        $adduser->status     = $request->input('istatus');
        $adduser->name     = $request->input('inama');
        $adduser->gender       = $request->input('ijeniskelamin');
        $adduser->email        = $request->input('iemail');
        $adduser->save();

        
        if ($adduser->job == 'Orang Tua')
        {
            // data orang tua
            $datapengguna = data_pengguna::find($request->input('listsiswa'));
            $adduser->nama_ortu_wali            = $request->input('inama');
            $datapengguna->alamat_ortu          = $request->input('ialamat');
            $datapengguna->tempat_lahir_ortu    = $request->input('itempatlahir');
            $datapengguna->tanggal_lahir_ortu   = $request->input('itanggallahir');
            $datapengguna->no_hp_ortu           = $request->input('inohp');
            
        } else 
        {
            // data selain ortu
            $datapengguna = new data_pengguna([
                'alamat' => $request->input('ialamat'),
                'tempat_lahir' => $request->input('itempatlahir'),
                'tanggal_lahir' => $request->input('itanggallahir'),
                'no_hp' => $request->input('inohp'),
            ]);

        }

        // create datapengguna relasi dengan user
        $datapengguna->save();
        $relasdatapenggunauser = User::find($adduser->id);
        $relasdatapenggunauser->datapengguna()->associate($datapengguna);
        $relasdatapenggunauser->save();

        // add role to new user
        if ($adduser->job == 'Admin') {
            // admin roles
            $adduser->attachRole(1);
        } elseif ($adduser->job == 'Guru') {
            # guru roles
            $adduser->attachRole(2);

        } elseif ($adduser->job == 'Orang Tua') {
            $adduser->attachRole(4);
        }


        return Redirect::route('users')->with('status', 'Pengguna Berhasil ditambah');

   }

   public function deletewithmodal($iddelete)
   {
        $model = 'Pengguna';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = User::find($iddelete);

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = 'User Tidak Ditemukan';
            return View('admin.layouts.modal_confirm', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('finaldelete', ['id' => $user->id]);
        return View('admin.layouts.modal_confirm', compact('error', 'model', 'confirm_route', 'user'));
   }

   public function destroy($id)
   {
        $huser = User::find($id);
        $huser->delete();

        $hdata = data_pengguna::find($huser->data_pengguna_id);
        $hdata->delete();

        return Redirect::route('users')->with('status', 'Pengguna Berhasil dihapus');

   }

}
