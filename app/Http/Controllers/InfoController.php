<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\smsgateway;

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
        // dd($siswa);
        // Show the page
        return View('admin.info.smsgateway', compact('iduser'));
    }

    public function kirimsms(UserRequest $request)
    {
    	$maxkelompok = smsgateway::find(DB::table('smsgateway')->max('kelompok_sms'));
    	if ($request->input('modesms') == 'satunomor'){
    		$sms = new smsgateway;
    		$sms->notujuan = $request->input('inotujaun');
    		$sms->isipesan = $request->input('isipesan');
    		$sms->kelompok_sms = $maxkelompok->kelompok_sms + 1;
    	}

    	$sms->save();

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
