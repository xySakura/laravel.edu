@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">

        <!-- Header -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            设置权限
                        </h2>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-white btn-sm" href="{{route('role.permission.forget_permission_cache')}}">清除缓存</a>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>

        <form action="{{route('role.role.set_role_permission',$role)}}" method="post">
            @csrf
            <div class="">
                <div class="card-body">
                    @foreach($modules as $module)
                        <div class="card">
                            <div class="card-header ">
                                {{$module['title']}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($module['permissions'] as $v)
                                        <div class="col-6">
                                            <input type="checkbox"
                                                   name="permissions[]"
                                                   value="{{$module['name'] . '-' . $v['name']}}"
                                                   @if($role->hasPermissionTo($module['name'] . '-' . $v['name'])) checked @endif
                                                   @if('Admin-admin-index' == $module['name'] . '-' . $v['name'])
                                                   checked
                                                    @endif
                                            >
                                            <strong>{{$v['title']}}</strong>
                                            |
                                            <span>{{$module['name']}}-{{$v['name']}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-primary btn-block">提交</button>
                </div>
             </div>
        </form>
    </div>
@endsection
