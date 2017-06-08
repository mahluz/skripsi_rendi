<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', [
// 	"as" => "home",
// 	"uses" => "PageController@showHome"
// ]);

Route::auth();

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('katsurat/{id}', 'HomeController@katsurat');

Route::get('profile/{tab?}', 'HomeController@profile');

Route::get('profileuser/{id}', 'HomeController@profileuser');

Route::get('plagiat', 'HomeController@plagiat');

Route::get('lolos', 'HomeController@lolos');

Route::get('diterima', 'HomeController@diterima');

Route::get('diterima/excel', 'HomeController@diterimaexcel');

Route::get('revisi', 'HomeController@revisi');

Route::get('ditolak', 'HomeController@ditolak');

Route::get('makalahuser', 'HomeController@makalahuser');

Route::post('simpanPengaturan', 'HomeController@simpanPengaturan');

Route::get('plotdosen/{id}','MakalahController@plotdosen');

Route::post('savedosen/{id}','MakalahController@savedosen');

Route::post('makalah/{id}/komentar','MakalahController@komentar');

Route::get('makalah/{id}/pdf','MakalahController@toPdf');

Route::post('profileupdate','HomeController@profileupdate');

Route::post('changepwd','HomeController@changepwd');

Route::get('compare/{id}','MakalahController@compare');

Route::get('404',function(){
	return view('errors/404');
});

Route::get('503',function(){
	return view('errors/503');
});


Route::resource('dosen','DosenController');

Route::resource('mahasiswa','MahasiswaController');


Route::resource('kategori','KategoriController');


Route::resource('surat_masuk','SuratmasukController');

Route::resource('surat_keluar','SuratkeluarController');

Route::resource('suratsaya','SuratkeluarController@suratsaya');

Route::resource('verifykajur','SuratkeluarController@verifykajur');

Route::resource('penelitian','SuratkeluarController@penelitian');

Route::resource('pkl','SuratkeluarController@pkl');

Route::resource('observasi','SuratkeluarController@observasi');

Route::resource('rhs','SuratkeluarController@rhs');

Route::resource('pkl','SuratkeluarController@pkl');
Route::resource('edit_rhs','SuratkeluarController@edit_rhs');

Route::resource('permohonan','SuratkeluarController@permohonan');

Route::resource('cetakkrs','SuratkeluarController@cetakkrs');

Route::resource('cetak','SuratkeluarController@cetak');

Route::resource('tembusan','SuratmasukController@tembusan');

Route::post('disposisi','SuratkeluarController@disposisi');

Route::post('notif','notifController@index');

Route::get('selectedSuratKeluarKajur/{id}','SuratkeluarController@selectedSuratKeluarKajur');
