<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //获取当前用户发表的文章
        $articles = Article::latest()->where('user_id',$user->id)->paginate(9);
        return view('member.user.show',compact('user','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Request $request)
    {
        //调用策略
        $this->authorize('isMine',$user);

        //处理type参数
        $type = $request->query('type');
        //dd($type);

        return view('member.user.edit_'.$type,compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $this->authorize('isMine',$user);
        $this->validate($request,[
            'name'=>'sometimes|required',
            'password'=>'sometimes|required|min:6|confirmed',
        ],[
            'password.required'=>'请输入密码',
            'password.min'=>'密码长度不能少于6位',
            'password.confirmed'=>'两次密码不一致',
            'name.required'=>'请输入昵称'
        ]);

        $data = $request->all();

        //密码加密
        if($request->password){
            $data['password'] = bcrypt($data['password']) ;
        }
        $user ->update($data);
        return redirect()->route('member.user.show',$user)->with('success','操作成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
