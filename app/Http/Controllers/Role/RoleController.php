<?php

namespace App\Http\Controllers\Role;

use App\Models\Module;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin',[
            'except'=>[],
        ]);
    }

    public function index()
    {
        xyHasRole('permission');
        $roles =Role::paginate(10);

        return view('role.role.index',compact('roles'));
    }


    public function create()
    {

        xyHasRole('permission');
        return view('role.role.create');
    }


    public function store(Request $request)
    {

        xyHasRole('permission');
        Role::create($request->all());

        return redirect()->route('role.role.index')->with('success','操作成功');
    }


    public function show(Role $role)
    {
        xyHasRole('permission');

        $modules = Module::all();
        //dd($modules->toArray());

        return view('role.role.set_permission',compact('modules','role'));
    }


    public function edit(Role $role)
    {
        xyHasRole('permission');

        return view('role.role.edit',compact('role'));
    }


    public function update(Request $request, Role $role)
    {
        xyHasRole('permission');
        $role->update($request->all());
        return redirect()->route('role.role.index')->with('success','操作成功');

    }


    public function destroy(Role $role)
    {
        xyHasRole('permission');
        $role->delete();
        return redirect()->route('role.role.index')->with('success','操作成功');
    }

    public function setRolePermission(Role $role,Request $request){
        xyHasRole('permission');
        //给角色设置权限
        //        dd($request->all());
        $role->syncPermissions($request->permissions);
        return back()->with('success', '操作成功');
    }
}
