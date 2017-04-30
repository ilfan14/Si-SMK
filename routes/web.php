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
});






