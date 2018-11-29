<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\Models\Collect;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this -> middleware(
            'auth',
            [
                'only' => ['edit', 'update', 'follow'],
            ]
        );
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //获取当前用户发表的文章
        $articles = Article ::latest() -> where('user_id', $user -> id)
            -> paginate(12);

        return view('member.user.show', compact('user', 'articles'));
    }


    public function edit(User $user, Request $request)
    {
        //调用策略
        $this -> authorize('isMine', $user);

        //处理type参数
        $type = $request -> query('type');

        //dd($type);

        return view('member.user.edit_'.$type, compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $this -> authorize('isMine', $user);
        $this -> validate(
            $request,
            [
                'name'     => 'sometimes|required',
                'password' => 'sometimes|required|min:6|confirmed',
            ],
            [
                'password.required'  => '请输入密码',
                'password.min'       => '密码长度不能少于6位',
                'password.confirmed' => '两次密码不一致',
                'name.required'      => '请输入昵称',
            ]
        );

        $data = $request -> all();

        //密码加密
        if ($request -> password) {
            $data['password'] = bcrypt($data['password']);
        }
        //dd($data);
        $user -> update($data);

        //dd($data);
        return redirect() -> route('member.user.show', $user) -> with(
            'success',
            '操作成功'
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    //关注&取消关注
    public function follow(User $user)
    {
        $user -> followed() -> toggle(auth() -> user());

        return back();

    }

    public function following(User $user)
    {
        $followers = $user -> following() -> paginate(12);

        return view('member.user.following', compact('user', 'followers'));
    }

    public function followed(User $user)
    {
        $followers = $user -> followed() -> paginate(12);

        return view('member.user.followed', compact('user', 'followers'));
    }

    public function myLike(User $user,Request $request)
    {
        $type = $request->query('type');

        $likesData=$user->like()->where( 'like_type' , 'App\Models\\' . ucfirst( $type ) )->paginate( 12 );
        //dd($likesData);

        return view('member.user.my_like_'.$type,compact('user','likesData'));
    }


    public function myCollect(User $user)
    {


        //dd($articles);
        //return view('member.user.collect',compact('user','articles'));
    }

}
