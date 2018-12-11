<?php

namespace App\Http\Controllers\Role;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin',[
            'except'=>[],
        ]);
    }

    public function index(){
        xyHasRole('permission');

        $users = User::paginate(12);

        //dd($users);

        return view('role.user.index',compact('users'));

    }

    //展示用户设置角色模板
    public function userSetRoleCreate(User $user){
        xyHasRole('permission');

        $roles = Role::all();


        return view('role.user.set_role',compact('user','roles'));
    }

    //给 用户设置角色
    public function userSetRoleStore(User $user,Request $request){
        xyHasRole('permission');
        //        dd($request->all());
        $user->syncRoles($request->roles);
        return back()->with('success','设置成功');
    }


}
