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
                            用户管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('role.role.index')}}" class="nav-link active">
                                    用户列表
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="table-responsive mb-0" data-toggle="lists"
             data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
            <div class="col">

                <!-- Form -->
                <form>
                    <div class="input-group input-group-lg input-group-merge">
                        <input type="text" class="form-control form-control-prepended search"
                               placeholder="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fe fe-search"></span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="container-fluid mt-3">
                @if($users->count() == 0)
                    <p class="text-muted text-center p-5">暂无用户</p>
                @else
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-4">

                                <!-- Card -->
                                <div class="card">

                                    <div class="card-body text-center">

                                        <a href="{{route('member.user.show',$user)}}"
                                           class="avatar avatar-xl card-avatar ">
                                            <img src="{{$user->icon}}"
                                                 class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>

                                        <h2 class="card-title">
                                            <a href="{{route('member.user.show',$user)}}">{{$user->name}}</a>
                                        </h2>
                                        <p>角色：
                                            @if($user->role->count() != 0)
                                                @foreach($user->role as $v)
                                                    <strong style="color: #52c3ff;">{{$v->title}}</strong>
                                                @endforeach
                                            @else
                                                <span>无</span>
                                            @endif
                                        </p>
                                        <hr>
                                        <div class="row align-items-center justify-content-between">
                                            <a href="{{route('role.user.user_set_role_create',$user)}}"
                                               class="btn btn-white btn-block">设置角色</a>
                                        </div>


                                    </div>

                                </div>

                            </div>
                        @endforeach
                        @endif


                    </div>
                    {{$users->links()}}
            </div> <!-- / .container-fluid -->
        </div>

    </div>
@endsection
