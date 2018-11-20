@extends('admin.layouts.master')
@section('content')
    {{--modal*************--}}
    <!-- Modal: add -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-vertical" role="document">
            <div class="modal-content">
                <div class="modal-body" data-toggle="lists" data-lists-values='["name"]'>


                    <form method="post" action="{{route('admin.category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">文章标题</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">文章小标题</label>
                            <input type="text" name="stitle" class="form-control" id="exampleInputEmail1"
                                   placeholder="">
                        </div>

                        <label for="exampleInputEmail1">栏目图标</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="icon"></span>
                            </div>
                            <input type="text"  readonly name="icon" class="form-control"
                                   aria-label="Amount (to the nearest dollar) " >
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="choose()" style="cursor: pointer">选择图标</span>
                            </div>
                        </div>
                        <button type="reset" class="btn btn-primary">重置</button>
                        <button type="submit" class="btn btn-primary" style="float: right">保存</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal: edit -->
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
                                <a href="#" class="nav-link active">
                                    文章列表
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
                                    文章
                                </h4>

                            </div>
                            <div class="col-auto">


                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                {{--<a href="#!" class="btn btn-sm btn-primary">--}}
                                {{--添加--}}
                                {{--</a>--}}
                                <button class="btn btn-primary" data-toggle="modal" data-target="#add">
                                    添加
                                </button>

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
                                @foreach($categories as $category)
                                <li class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            {{--<a href="#" class="avatar avatar-lg">--}}
                                            {{--<span class="{{$category->icon}}"></span>--}}
                                            {{--</a>--}}
                                            <a href="#!" class="avatar avatar-lg">
                                                <span class="avatar-title rounded bg-white text-secondary">
                                                    <span class="{{$category->icon}}"></span>
                                                </span>
                                            </a>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="card-title mb-1 name">
                                                <a href="#!">{{$category->title}}</a>
                                            </h4>

                                            <!-- Text -->
                                            <p class="card-text small text-muted mb-1">
                                                {{$category->stitle}}
                                            </p>

                                            <!-- Time -->
                                            <p class="card-text small text-muted">
                                                添加于 {{$category->updated_at}}
                                            </p>

                                        </div>
                                        <div class="col-auto">

                                            {{--<!-- Button -->--}}
                                            {{--<a href="#!" class="btn btn-sm btn-white d-none d-md-inline-block">--}}
                                            {{--Download--}}
                                            {{--</a>--}}

                                        </div>
                                        <div class="col-auto">

                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{route('admin.category.edit',$category)}}" class="dropdown-item" >
                                                        编辑
                                                    </a>
                                                    <a href="#" class="dropdown-item" onclick="del(this)">
                                                        删除
                                                    </a>
                                                    <form action="{{route('admin.category.destroy',$category)}}" method="post">
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
        {{$categories->links()}}
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