@extends('home.layouts.master')
@section('content')
    {{--@can('update',$data)--}}
    {{--@endcan--}}
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Files -->
                    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        搜索列表
                                    </h4>

                                </div>
                                {{--<div class="col-auto">--}}

                                    {{--<!-- Dropdown -->--}}
                                    {{--<div class="dropdown">--}}

                                        {{--<!-- Toggle -->--}}
                                        {{--<a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">--}}
                                            {{--筛选--}}
                                        {{--</a>--}}

                                        {{--<!-- Menu -->--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--@foreach($categories as $category)--}}
                                                {{--<a class="dropdown-item sort" data-sort="name" href="{{route('home.search',['wd'=>Request::query('wd'),'category'=>$category['id']])}}">--}}
                                                    {{--{{$category['title']}}--}}
                                                {{--</a>--}}
                                            {{--@endforeach--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                {{--</div>--}}
                            </div> <!-- / .row -->
                        </div>

                        <div class="card-body">

                            <!-- List -->
                            <ul class="list-group list-group-lg list-group-flush list my--4">
                                @if($type == 'article')
                                    @foreach($articles as $article)
                                    <li class="list-group-item px-0">

                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="{{route('member.user.show',$article->user)}}" class="avatar avatar-sm">
                                                    <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded">
                                                </a>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="card-title mb-1 name">
                                                    <a href="{{route('home.article.show',$article)}}">{{$article->title}}</a>
                                                </h4>

                                                <p class="card-text small mb-1">
                                                    <a href="{{route('member.user.show',$article->user)}}" class="text-secondary mr-2">
                                                        <i class="fa fa-user-circle" aria-hidden="true"></i> {{$article->user->name}}
                                                    </a>
                                                    {{--Carbon 处理时间库--}}
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{$article->created_at->diffForHumans()}}

                                                        <i class="fa fa-folder-o" aria-hidden="true"></i> {{$article->category->title}}
                                                </p>

                                            </div>
                                        </div> <!-- / .row -->

                                    </li>
                                @endforeach
                                @elseif($type == 'user')
                                    @foreach($users as $user)
                                        <li class="list-group-item px-0">

                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="{{route('member.user.show',$user)}}" class="avatar avatar-sm">
                                                        <img src="{{$user->icon}}" alt="..." class="avatar-img rounded">
                                                    </a>

                                                </div>
                                                <div class="col ml--2">

                                                    <!-- Title -->
                                                    <h4 class="card-title mb-1 name">
                                                        <a href="{{route('member.user.show',$user)}}">{{$user->name}}</a>
                                                    </h4>

                                                    <p class="card-text small mb-1">

                                                    </p>

                                                </div>
                                            </div> <!-- / .row -->

                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                        </div>
                    </div>
                    {{--自定义分页url--}}
                    {{--手册位置：分页-->附加参数到分页链接--}}
                    {{--appends(['参数名' => '参数值'])--}}
{{--                    {{$articles->appends(['wd' => Request::query('wd'),'category'=>Request::query('category')])->links()}}--}}
                    @if($type == 'article')
                        {{$articles->appends(['wd' => Request::query('wd')])->links()}}
                    @elseif($type == 'user')
                        {{$users->appends(['wd' => Request::query('wd')])->links()}}
                    @endif

                </div>
            </div> <!-- / .row -->
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js'], function (swal) {
                swal("确定删除?", {
                    icon: 'warning',
                    buttons: {
                        cancel: "取消",
                        defeat: '确定',
                    },
                }).then((value) => {
                    switch (value) {
                        case "defeat":
                            $(obj).next('form').submit();
                            break;
                        default:

                    }
                });
            })
        }
    </script>
@endpush