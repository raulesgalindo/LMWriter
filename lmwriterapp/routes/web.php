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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createfile', 'FileController@createFile')->name('createfile');
Route::get('/updatefile', 'FileController@updateFile')->name('updatefile');
Route::get('/deletefile', 'FileController@deleteFile')->name('deletefile');
Route::post('/savefile', 'FileController@saveFile')->name('savefile');
Route::get('/findbyfilter', 'FileController@findByFilter')->name('findbyfilter');
