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
                            权限列表
                        </h2>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-white btn-sm" href="{{route('role.permission.forget_permission_cache')}}">清除缓存</a>
                    </div>

                </div> <!-- / .row -->
            </div>
        </div>


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
                                <strong>{{$v['title']}}</strong>
                                |
                                <span>{{$module['name']}}-{{$v['name']}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
