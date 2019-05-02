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
    return view('index');
});

Route::get('/index', 'IndexController@showIndex');

Auth::routes();

Route::post('/edit', 'UserController@edit')->name('edit');
Route::get('/edit', 'UserController@edit')->name('edit');
Route::get('/login/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/home', 'AnnonceController@store')->name('home');
Route::post('/home', 'AnnonceController@store')->name('home');

Route::get('/annonce', 'AnnonceController@create')->name('annonce');
Route::get('/annonce/delete/{id}', 'AnnonceController@destroy')->name('annonce.delete');
Route::get('/annonce/edit/{id}', 'AnnonceController@edit')->name('annonce.edit');
Route::post('/annonce/edit/{id}', 'AnnonceController@edit')->name('annonce.edit');

Route::get('recherche', 'AnnonceController@show')->name('recherche');
Route::post('recherche', 'AnnonceController@show')->name('recherche');
