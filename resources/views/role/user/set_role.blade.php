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
                            设置角色
                        </h2>

                    </div>

                </div> <!-- / .row -->
            </div>
        </div>


        <form action="{{route('role.user.user_set_role_store',$user)}}" method="post">
            @csrf
            <div class="">
                @foreach($roles as $role)
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <input type="checkbox"
                                       name="roles[]"
                                value="{{$role['name']}}"
                                @if($user->hasRole($role['name'])) checked @endif
                                >
                                <strong>{{$role->title}}</strong>
                                <br>
                                <p style="margin-bottom: 0">
                                    @foreach($role->permissions as $permission)
                                        {{$permission->title}} |
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-primary btn-block mb-5">保存</button>
        </form>
    </div>
@endsection
