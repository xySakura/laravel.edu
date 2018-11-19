<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //调用中间件，保护登陆注册页面
    public function __construct()
    {
        $this->middleware('guest',['only'=>['passwordResetForm','passwordReset','loginForm','login','register','store']]);
    }

    //密码重置表单
    public function passwordResetForm(PasswordResetRequest $request){

        $user = User::where('email',$request->email)->first();
        //dd($user);
        if($user){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('home')->with('success','重置成功');
        }
        return redirect()->back()->with('danger','邮箱错误');
    }

    //密码重置页面
    public function passwordReset(){
        return view('user.passwordReset');
    }

    //退出登录
    public function logout(){
        \Auth::logout();
        return redirect()->route('home')->with('success','退出成功');
    }

    //登陆表单
    public function loginForm(Request $request)
    {
        //$request->validate([],[])
        //dd(1);

        $this -> validate(
            $request,
            [
                'email'    => 'email',
                'password' => 'required|min:6',
            ],
            [
                'email.email'      => '邮箱不能为空',
                'password.required' => '密码不能为空',
                'password.min'     => '密码长度不能小于6位',
            ]
        );
        $credentials = $request->only('email','password');
        if(\Auth::attempt($credentials,$request->remember)){
            return redirect()->route('home')->with('success','登陆成功');
        }
        return redirect()->back()->with('danger','用户名或密码不正确');
    }

    //登陆页面
    public function login()
    {
        return view('user.login');
    }

    //注册页面
    public function register()
    {

        return view('user.register');
    }

    //注册表单
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $data             = $request -> all();
        $data['password'] = bcrypt($data['password']);
        User ::create($data);

        return redirect() -> route('home') -> with('success', '注册成功');
    }

}
