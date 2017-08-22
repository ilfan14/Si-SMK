<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Kelas;
use App\Rombel;
use App\User;
use App\Nilai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class NilaiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iduser = Auth::id();
        return View('admin.siswa.lihatnilai', compact('iduser'));
    }

    public function siswawithnilai()
    {
        // Grab all the kelas
        $siswa = DB::table('users')
                            ->leftjoin('rombel','rombel.user_id', '=', 'users.id')
                            ->leftjoin('kelas','kelas.id_kelas','=','rombel.id_kelas')
                            ->where('users.job', '=', 'siswa')
                            ->select('id','username', 'name', 'nama_kelas', 'gender')
                            ->get();

        // $siswa = User::where('job','siswa')->get();
        return response()->json(['data' => $siswa]);
    }

    public function onlynilai($id)
    {
        $nilai = DB::table('nilai')->where('user_id', $id)
                                    ->join('mapel', 'mapel.kode_mapel', '=', 'nilai.kode_mapel')
                                    ->get();
        return response()->json($nilai);
    }

    public function create(UserRequest $request)
    {
        $nilai = new Nilai;
        $nilai->kode_mapel = $request->get('kodemapel');
        $nilai->user_id = $request->get('idsiswa');
        $nilai->nilai = $request->get('nilai');
        $nilai->keterangan = $request->get('keterangan');
        $nilai->save();

        Session::flash('message', "Special message goes here");
        return Redirect::back();
    }

    public function delete($idnilai) 
    {
        Nilai::where('id_nilai', $idnilai)->delete();
        return Redirect::back();
    }

    public function lihatilaisiswa()
    {
        $iduser = Auth::id();
        $nilai = DB::table('nilai')->where('user_id', $iduser)
                                    ->join('mapel', 'mapel.kode_mapel', '=', 'nilai.kode_mapel')
                                    ->get();
        // Show the page
        return View('admin.siswa.lihatnilaisiswa', compact('nilai', 'iduser'));
    }

    public function tambahnilaipilihkelas()
    {
        $iduser = Auth::id();
        return view('admin.siswa.tambahnilai', compact('iduser'));
    }

    public function goinputnilaikelas(UserRequest $request)
    {
        $iduser = Auth::id();

        $idkelas = $request->input('listkelas');
        $kodemapel = $request->input('mapel');
        $listsiswa = DB::table('rombel')->where('rombel.id_kelas', '=', $idkelas)
                                        ->join('users', 'rombel.user_id', '=', 'users.id')
                                        ->join('kelas', 'rombel.id_kelas', '=', 'kelas.id_kelas')
                                        ->select('users.id','username','name','gender', 'nama_kelas')
                                        ->get();
        return view('admin.siswa.inputnilai', compact('iduser','listsiswa','kodemapel'));

    }

    public function gosavenilai(UserRequest $request)
    {
        $daftarnilai = $request->input('daftarnilai');
        $listid = $request->input('idsiswa');
        $kodemapel = $request->input('kodemapel');

        foreach($listid as $key=>$value) {
            // do stuff
            $nilai = new Nilai;
            $nilai->kode_mapel = $kodemapel;
            $nilai->user_id = $value;
            $nilai->nilai = $daftarnilai[$key];
            $nilai->keterangan = $request->get('keterangan');
            $nilai->save();
        }

        return Redirect::route('lihatnilai')->with('status', 'Nilai Berhasil Ditambah');

    }
}
