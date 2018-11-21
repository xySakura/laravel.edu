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
//前台路由组
Route::group(['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function(){
    Route::get('/','HomeController@index')->name('index');
    //文章管理
    Route::resource('article','ArticleController');
});

//用户中心
Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function(){
    //用户管理
    Route::resource('user','UserController');
});

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
Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function(){
    //发送验证码
    Route::any('/code/send','CodeController@send')->name('code.send');
    //上传
    Route::any('/upload','UploadController@uploader')->name('upload');
    Route::any('/filesLists','UploadController@filesLists')->name('filesLists');


});

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



