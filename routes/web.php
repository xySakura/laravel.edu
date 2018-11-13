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


Route::get('/admin/index/index','Admin\IndexController@index')->name('admin.index.index');
Route::get('/admin/index/create','Admin\IndexController@create')->name('admin.index.create');

Route::resource('/admin/photo','Admin\PhotoController');