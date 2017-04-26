<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use App\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Input;
use Excel;

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

    public function create(UserRequest $request)
    {

        $tambahkelas = new Kelas;
        $tambahkelas->nama_kelas = $request->get('namakelas');
        $tambahkelas->save();

        echo "work";
    }

    public function edit(UserRequest $request)
    {

        $idkelas = $request->get('idkel');
        $editkelas = Kelas::where('id_kelas', $idkelas)->first();
        $editkelas->nama_kelas = $request->get('namakelas');
        $editkelas->save();

        echo "work";
    }

    public function cetak()
    {

        Excel::create('Filename', function($excel) {

            $excel->sheet('Sheetname', function($sheet) {

                $sheet->fromArray(array(
                    array('data panjanggggggggggggggg', 'data2'),
                    array('data3', 'data4')
                ), 'test', 'A1', true);
                
                $sheet->row(1, array(
                     'head1', 'head1'
                ));

            });

        })->export('xls');

    }
}
