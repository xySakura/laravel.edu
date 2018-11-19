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


//首页
Route ::get('/', 'HomeController@index') -> name('home');

//用户管理
Route ::get('/register', 'UserController@register') -> name('register');
Route ::post('/register', 'UserController@store') -> name('register');
Route ::get('/login', 'UserController@login') -> name('login');
Route ::post('/login', 'UserController@loginForm') -> name('login');
Route ::get('/logout', 'UserController@logout') -> name('logout');
Route ::get('/passwordReset', 'UserController@passwordReset') -> name(
    'passwordReset'
);
Route ::post('/passwordReset', 'UserController@passwordResetForm') -> name(
    'passwordReset'
);

//工具类
Route ::any('/code/send', 'Util\CodeController@send') -> name('code.send');

//后台管理
Route ::group(
    [
        'middleware' => ['auth.admin'],
        'prefix'     => 'admin',
        'namespace'  => 'Admin',
        'as'         => 'admin.',
    ],
    function () {
        Route ::get('index', 'IndexController@index') -> name('index');
        Route ::resource('category', 'CategoryController');
    }
);



