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
    //评论管理
    Route::resource('comment','CommentController');
    //点赞管理
    Route::get('like/make','LikeController@make')->name('like.make');
    //收藏管理
    Route::get('collect/make','CollectController@make')->name('collect.make');
    //搜索
    Route::get('search','HomeController@search')->name('search');
});

//用户中心
Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function(){
    //用户管理
    Route::resource('user','UserController');
    //关注管理
    Route::get('follow/{user}','UserController@follow')->name('follow');
    //关注页面
    Route::get('following/{user}','UserController@following')->name('following');
    Route::get('followed/{user}','UserController@followed')->name('followed');
    //点赞收藏管理
    //点赞
    Route::get('mylike/{user}','UserController@myLike')->name('mylike');
    Route::get('mycollect/{user}','UserController@myCollect')->name('mycollect');

    //通知管理
    Route::get('notify/{user}','NotifyController@index')->name('notify');
    Route::get('notify/show/{notify}','NotifyController@show')->name('notify.show');
});

//首页
Route ::get('/', 'Home\HomeController@index') -> name('home');

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
        //配置项
        Route::get('config/edit/{name}','ConfigController@edit')->name('config.edit');
        Route::post('config/update/{name}','ConfigController@update')->name('config.update');
    }
);

//微信管理
Route::group(['prefix'=>'wechat','namespace'=>'Wechat','as'=>'wechat.'],function (){
    Route::resource('menu','WechatMenuController');
    Route::any('api/handler','ApiController@handler')->name('api.handler');
    Route::get('menu/push/{menu}','WechatMenuController@push')->name('menu.push');
    //自动回复文本
    Route::resource('response_text','ResponseTextController');
    //自动回复图文
    Route::resource('response_news','ResponseNewsController');
    //微信默认回复
    Route::resource('response_default','ResponseDefaultController');
});

//轮播图管理
Route::group(['prefix'=>'swiper','namespace'=>'Swiper','as'=>'swiper.'],function (){
    Route::resource('swiper','SwiperController');
});

//权限管理
Route::group(['prefix'=>'role','namespace'=>'Role','as'=>'role.'],function() {
    //权限列表
    Route::get('permission/index','PermissionController@index')->name('permission.index');
    //清除权限缓存
    Route::get('permission/forget_permission_cache','PermissionController@forgetPermissionCache')->name('permission.forget_permission_cache');
    //角色管理的资源路由
    Route::resource('role','RoleController');
    //设置角色权限
    Route::post('role/set_role_permission/{role}','RoleController@setRolePermission')->name('role.set_role_permission');
    //用户设置角色
    Route::get('user/index','UserController@index')->name('user.index');
    Route::get('user/user_set_role_create/{user}','UserController@userSetRoleCreate')->name('user.user_set_role_create');
    Route::post('user/user_set_role_store/{user}','UserController@userSetRoleStore')->name('user.user_set_role_store');
});


