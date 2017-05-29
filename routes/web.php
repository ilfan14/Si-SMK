<?php


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(array('prefix' => 'get'), function () {
    Route::get('listkelas', array('as' => 'getlistkelas', function(App\Kelas $kelas){
        return $kelas->listkelas();
    }));
});


Route::group(array('prefix' => 'home'), function () {
	Route::get('/', array('as' => 'dashboard','uses' => 'HomeController@index'));

	Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'UserController@index'));
        Route::post('gantigambar', array('as' => 'gantigambar', 'uses' => 'UserController@changeimage'));
        Route::post('passwordreset', 'UserController@passwordreset');
        Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UserController@show'));
    });

    Route::group(array('prefix' => 'kelas'), function () {
        Route::get('/', array('as' => 'listkelas', 'uses' => 'KelasController@index'));
    	Route::get('listkelas/{jeniskelas}', array('as' => 'listkelas', 'uses' => 'KelasController@searchkelas'));
        Route::get('delete/{idkelas}', array('as' => 'deletekelas', 'uses' => 'KelasController@delete'));
        Route::post('createkelas', array('as' => 'createkelas', 'uses' => 'KelasController@create'));
        Route::post('editkelas', array('as' => 'editkelas', 'uses' => 'KelasController@edit'));
        Route::get('testcetak', 'KelasController@cetak');
    });

    Route::group(array('prefix' => 'siswa'), function () {
        Route::get('/', array('as' => 'listsiswa', 'uses' => 'SiswaController@index'));
        Route::post('tambahsiswa', array('as' => 'tambahsiswa', 'uses' => 'SiswaController@create'));
        Route::post('editsiswa', array('as' => 'editsiswa', 'uses' => 'SiswaController@edit'));
        Route::get('delete/{niksiswa}', array('as' => 'deletesiswa', 'uses' => 'SiswaController@delete'));
    });


    Route::group(array('prefix' => 'mapel'), function () {
        Route::get('/', array('as' => 'listmapel', 'uses' => 'MapelController@index'));
        Route::post('tambahmapel', array('as' => 'tambahmapel', 'uses' => 'MapelController@create'));
        Route::post('editmapel', array('as' => 'editmapel', 'uses' => 'MapelController@edit'));
        Route::get('delete/{nikmapel}', array('as' => 'deletemapel', 'uses' => 'MapelController@delete'));
        Route::get('listkodemapel', array('as' => 'listkodemapel', 'uses' => 'MapelController@listkodemapel'));
    });

    Route::group(array('prefix' => 'nilai'), function () {
        Route::get('/', array('as' => 'lihatnilai', 'uses' => 'NilaiController@index'));
        Route::get('siswawithnilai', array('as' => 'siswawithnilai', 'uses' => 'NilaiController@siswawithnilai'));
        Route::get('onlynilai/{userid}', array('as' => 'onlynilai', 'uses' => 'NilaiController@onlynilai'));
        Route::post('tambahnilai', array('as' => 'tambahnilai', 'uses' => 'NilaiController@create'));
    //     Route::post('editmapel', array('as' => 'editmapel', 'uses' => 'MapelController@edit'));
        Route::get('deletenilai/{idnilai}', array('as' => 'deletenilai', 'uses' => 'NilaiController@delete'));
        Route::get('siswa', array('as' => 'lihatnilaisiswa', 'uses' => 'NilaiController@lihatilaisiswa'));
    });


    Route::group(array('prefix' => 'absen'), function () {
        Route::get('/', array('as' => 'absen', 'uses' => 'AbsensiController@index'));
        Route::post('absenkelas', array('as' => 'absenkelas', 'uses' => 'AbsensiController@absenkelas'));
        Route::post('doabsen', array('as' => 'doabsen', 'uses' => 'AbsensiController@doabsen'));


    });

});






