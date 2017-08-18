<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\smsgateway;
use App\User;
use App\Kelas;
use App\Rombel;

class InfoController extends Controller
{
    //

    public function index()
    {

        $iduser = Auth::id();
        // dd($siswa);
        // Show the page
        return View('admin.info.index', compact('iduser'));
    }

    public function smsgateway()
    {

        $iduser = Auth::id();
        $user = User::where('job', 'Siswa')->select('id','name')->get();
        $listsiswa = $user->pluck('name','id');
        $kelas = Kelas::all();
        $listkelas = $kelas->pluck('nama_kelas','id_kelas');


        return View('admin.info.smsgateway', compact('iduser','listsiswa','listkelas'));
    }

    public function kirimsms(UserRequest $request)
    {
    	$maxkelompok = smsgateway::find(DB::table('smsgateway')->max('kelompok_sms'));
    	if ($request->input('modesms') == 'satunomor'){
    		$sms = new smsgateway;
    		$sms->notujuan = $request->input('inotujaun');
    		$sms->isipesan = $request->input('isipesan');
    		$sms->kelompok_sms = $maxkelompok->kelompok_sms + 1;
            $sms->save();
    	} elseif ($request->input('modesms') == 'satusiswa') {
            $siswa = User::find($request->input('idsiswa'));
            $nomorsiswa = $siswa->datapengguna;

            $sms = new smsgateway;
            $sms->notujuan = '0' . $nomorsiswa->no_hp;
            $sms->isipesan = $request->input('isipesan');
            $sms->kelompok_sms = $maxkelompok->kelompok_sms + 1;
        } elseif ($request->input('modesms') == 'perkelas') {

            $userkelas = DB::table('rombel')->where('rombel.id_kelas', '=', $request->input('idkelas'))
                                        ->join('users', 'rombel.user_id', '=', 'users.id')
                                        ->join('kelas', 'rombel.id_kelas', '=', 'kelas.id_kelas')
                                        ->join('data_pengguna', 'data_pengguna.id', '=', 'users.data_pengguna_id')
                                        ->select('users.id','username','name','gender', 'nama_kelas','data_pengguna.no_hp')
                                        ->get();

            
            foreach($userkelas as $key=>$value) {
                $sms = new smsgateway;
                $sms->notujuan = '0' . $value->no_hp;
                $sms->isipesan = $request->input('isipesan');
                $sms->kelompok_sms = $maxkelompok->kelompok_sms + 1;
                $sms->save();
            }  
        }



		return Redirect::route('sms')->with('status', 'SMS Berhasil dikrim');
    }

    public function apimodem()
    {
    	$hasilcek = smsgateway::where('status', '=', 'Pending')->select('id', 'notujuan', 'isipesan','kelompok_sms')->get();



		return (String) $hasilcek;

    }

    public function modemupdatestatus($id)
    {
    	$terkirim = smsgateway::find($id);
    	$terkirim->status = "Terkirim";
    	$terkirim->save();

    	return "Diupdate";
    }


}
