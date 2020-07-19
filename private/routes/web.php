<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@index');
Route::get('/dashboard', 'SppController@dashboard');

Route::get('/user_view', 'UserController@list_user');
Route::get('/user_detail/{id}', 'UserController@detail_user');
// Route::get('/user_form', 'UserController@form_user');
Route::post('/user_save', 'UserController@save_user');
Route::post('/user_edit/{id}', 'UserController@user_edit');
Route::get('/form_edit_user/{id}','UserController@form_edit_user');
Route::get('/user_delete/{id}', 'UserController@user_delete');

Route::get('/login', 'Auth\LoginController@login');
Route::post('/login_submit', 'Auth\LoginController@login_submit' );
Route::get('/logout', 'Auth\LoginController@logout');

// Route::get('/spp_view_1', 'SppController@list_spp_1');
Route::get('/spp_view', 'SppController@list_spp');
Route::post('/spp_view/fetch', 'SppController@fetch')->name('sppcontroller.fetch');
Route::get('/spp_detail/{nomor_spp}', 'SppController@detail_spp');
Route::post('/spp_save', 'SppController@spp_save');
Route::get('/spp_routing/{nomor_spp}', 'SppController@spp_routing');
Route::post('/spp_edit_loket/{nomor_spp}', 'SppController@spp_edit_loket');
Route::post('/verifikasi1_edit/{nomor_spp}', 'SppController@verifikasi1_edit');
Route::post('/verifikasi2_edit/{nomor_spp}', 'SppController@verifikasi2_edit');
Route::get('/spp_delete/{nomor_spp}', 'SppController@spp_delete');
Route::post('/upload_dokumen', 'SppController@upload_dokumen');
Route::get('/spp_dok_hub/{id_spp}', 'SppController@spp_dok_hub');
Route::get('/download_dokumen/uploads/{file}', 'SppController@download_dokumen');

Route::get('/laporan_spp', 'SppController@laporan_spp');
Route::get('/laporan_dispen', 'SppController@laporan_dispen');
Route::get('/exportspp', 'SppController@export');


// Route::get('/dynamic_dependent', 'DynamicDependent@index');

// Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');

?>