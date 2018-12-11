<?php

namespace App\Http\Controllers\Role;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin',[
            'except'=>[],
        ]);
    }

    public function index(){
        xyHasRole('permission');

        $modules = Module::all();

        return view('role.permission.index',compact('modules'));
    }


    //清除权限缓存
    public function forgetPermissionCache(){
        xyHasRole('permission');
        app()['cache']->forget('spatie.permission.cache');
        return back()->with('success','缓存清除成功');
    }
}
