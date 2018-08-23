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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('Users','UsersController');
Route::resource('Consultants','ConsultantsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('photo/{name}','HomeController@profileImage')->name('profileImage');
Route::get('Users/{id}/image/{name}','HomeController@updateimg')->name('updateimg');
Route::post('Users/{id}/image/{id2}','HomeController@updateimg')->name('updateimg');
Route::get('get_caste_list/{id}','UsersController@getCasteList')->name('getCasteList');
