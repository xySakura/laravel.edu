@extends('admin.layouts.master')
@section('content')
    <!-- HEADER -->
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('wechat.menu.index')}}" class="nav-link active">
                                    菜单列表
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('wechat.menu.create')}}" class="nav-link">
                                    添加菜单
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Files -->
                <div class="card" data-toggle="lists" data-lists-values='["name"]'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    菜单
                                </h4>

                            </div>
                            <div class="col-auto">


                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                {{--<a href="#!" class="btn btn-sm btn-primary">--}}
                                {{--添加--}}
                                {{--</a>--}}

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">

                                <!-- Form -->
                                <form>
                                    <div class="input-group input-group-flush input-group-merge">
                                        <input type="search" class="form-control form-control-prepended search"
                                               placeholder="搜索">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fe fe-search"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-body">

                        <!-- List -->

                        <ul class="list-group list-group-lg list-group-flush list my--4">
                            @foreach($menus as $menu)

                                <li class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            {{--<a href="#" class="avatar avatar-lg">--}}
                                            {{--<span class="{{$category->icon}}"></span>--}}
                                            {{--</a>--}}

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="card-title mb-1 name">
                                                <a href="#!">{{$menu->title}}</a>
                                            </h4>

                                            <!-- Text -->
                                            <p class="card-text small text-muted mb-1">

                                            </p>

                                            <!-- Time -->
                                            <p class="card-text small text-muted">
                                                添加于{{$menu->created_at}}
                                            </p>

                                        </div>
                                        <div class="col-auto">

                                            <!-- Button -->
                                            @if(!$menu['status'])
                                            <a href="{{route('wechat.menu.push',$menu)}}" class="btn btn-sm btn-white d-none d-md-inline-block">
                                                推送到微信
                                            </a>
                                            @else
                                                <a href="#" class="btn btn-sm btn-success d-none d-md-inline-block">
                                                    已在线
                                                </a>
                                            @endif

                                        </div>
                                        <div class="col-auto">

                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{route('wechat.menu.edit',$menu)}}" class="dropdown-item" >
                                                        编辑
                                                    </a>
                                                    <a href="#" class="dropdown-item" onclick="del(this)">
                                                        删除
                                                    </a>
                                                    <form action="{{route('wechat.menu.destroy',$menu)}}" method="post">
                                                        @csrf @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </li>

                                @endforeach
                        </ul>


                    </div>
                </div>

            </div>
        </div> <!-- / .row -->

    </div> <!-- / .container-fluid -->


@endsection
@push('js')

    <script>

        function choose() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    $('input[name=icon]').val(icon)
                    $('#icon').addClass(icon)
                })
            })
        }

        function del(obj) {
            require(['hdjs','bootstrap'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(obj).next('form').submit();
                })
            })
        }
    </script>
@endpush