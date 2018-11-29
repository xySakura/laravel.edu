<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keyword" content="{{xy_config('base.keyword')}}">
    <meta name="description" content="{{xy_config('base.descriptions')}}">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/css/theme.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">


    <title>{{xy_config('base.title')}}</title>
</head>
<body>

<!--=====================================TOPNAV================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="{{route('home.index')}}">
            <img src="{{asset('org/Dashkit/assets')}}/img/logo.svg" alt="..." class="navbar-brand-img">
        </a>

        <!-- Form -->
        {{--**********************************************搜索**********************************************--}}
        <div style="position: relative">
            <form class="form-inline mr-4 d-none d-lg-flex" action="{{route('home.search')}}">
                <div class="input-group input-group-rounded input-group-merge" data-toggle="lists"
                     data-lists-values='["name"]' style="position: relative;z-index: 20!important;">
                    <input type="text" name="wd" class="form-control form-control-prepended " placeholder="搜索"
                           aria-label="Search">
                </div>
                <div class=" input-group-prepend" style="position: absolute;top: 0;left: -50px;">
                    <select class="form-control small" name="type">
                        <option value="article">
                            文章
                        </option>
                        <option value="user">
                            用户
                        </option>
                    </select>
                </div>
            </form>
        </div>

        <!-- User -->
        <div class="navbar-user">
        @auth()
            {{--*****************************************************通知*****************************************************--}}
            <!-- Dropdown -->
                <div class="dropdown mr-4 d-none d-lg-flex">

                    <!-- Toggle -->
                    <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                    <span class="icon @if(auth()->user()->unreadNotifications()->count() != 0) active @endif">
                        <i class="fe fe-bell"></i>
                    </span>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h5 class="card-header-title">
                                        通知
                                    </h5>

                                </div>
                                <div class="col-auto">

                                    <!-- Link -->
                                    <a href="{{route('member.notify',auth()->user())}}" class="small">
                                        查看全部通知
                                    </a>

                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .card-header -->
                        <div class="card-body">

                            <!-- List group -->

                            <div class="list-group list-group-flush my--3">
                                @if(auth()->user()->unreadNotifications()->count() != 0)
                                    @foreach(auth()->user()->unreadNotifications()->limit(3)->get() as $notification)
                                        <a class="list-group-item px-0"
                                           href="{{route('member.notify.show',$notification)}}">

                                            <div class="row">
                                                <div class="col-auto">

                                                    <!-- Avatar -->
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{$notification['data']['user_icon']}}" alt="..."
                                                             class="avatar-img rounded-circle">
                                                    </div>

                                                </div>
                                                <div class="col ml--2">

                                                    <!-- Content -->
                                                    <div class="small text-muted">
                                                        <strong class="text-body">{{$notification['data']['user_name']}}</strong>
                                                        评论了
                                                        <strong class="text-body">{{$notification['data']['article_title']}}</strong>
                                                    </div>

                                                </div>
                                                <div class="col-auto">

                                                    <small class="text-muted">
                                                        {{$notification->created_at->diffForHumans()}}
                                                    </small>

                                                </div>
                                            </div> <!-- / .row -->

                                        </a>
                                    @endforeach
                                @else

                                    <p class="text-muted text-center">暂无通知</p>
                                @endif
                            </div>

                        </div>
                    </div> <!-- / .dropdown-menu -->


                </div>
        @endauth

        <!-- 用户头像******************************************************** -->
            <div class="dropdown">
            @auth()
                <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('member.user.show',auth()->user())}}"
                           class="dropdown-item">{{auth()->user()->name}}</a>
                        @can('view',auth()->user())
                            <a href="{{route('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endcan
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">注销登陆</a>
                    </div>
                @else
                    <a href="{{route('login',['from'=>url()->full()])}}" class="btn btn-white btn-sm">登陆</a>
                    <a href="{{route('register')}}" class="btn btn-white btn-sm">注册</a>
                @endauth
            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        首页
                    </a>
                </li>

                {{--表头***************************************************************************************************************--}}

                <li class="nav-item dropdown">
                    <a class="nav-link " href="{{route('home.article.index')}}" id="topnavAuth">
                        文章列表
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavLayouts" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Layouts
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavLayouts">
                        <li>
                            <a class="dropdown-item" href="index.html">
                                Sidenav
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="dashboard-side-topnav.html">
                                Side + top nav
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item  active " href="dashboard-topnav.html">
                                Topnav
                            </a>
                        </li>
                        <li class="dropright">
                            <a class="dropdown-item dropdown-toggle" href="#!" id="topnavDashboard" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Without hero chart
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnavDashboard">
                                <a class="dropdown-item" href="dashboard-no-hero.html">
                                    Sidenav
                                </a>
                                <a class="dropdown-item" href="dashboard-side-topnav-no-hero.html">
                                    Side + topnav
                                </a>
                                <a class="dropdown-item " href="dashboard-topnav-no-hero.html">
                                    Topnav
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavDocumentation" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Docs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavDocumentation">
                        <li>
                            <a class="dropdown-item" href="getting-started.html">
                                Getting started
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="components.html">
                                Components
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="changelog.html">
                                Changelog
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div> <!-- / .container -->
</nav>

<!-- MAIN CONTENT================================================== -->
<div>
    @yield('content')
</div>


<footer class="container">
    <hr class="my-0">
    <div class="text-center py-6">
        <div>
            <p class="text-muted">没有什么是一个大师球解决不了的</p>
            <small class="small text-secondary">
                {{xy_config('base.icp')}}
            </small>
            <p class="small text-secondary">
                <i class="fa fa-phone-square" aria-hidden="true"></i> : heihei
                <i class="fa fa-telegram ml-2" aria-hidden="true"></i> :
                <a href="#" class="text-secondary">
                    592064881@qq.com
                </a>
                <br>
            </p>
        </div>
    </div>
</footer>
<!-- JAVASCRIPT

================================================== -->
<!-- Libs JS -->
<script src="{{asset('org/Dashkit/assets')}}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/chart.js/Chart.extension.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/highlight/highlight.pack.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/list.js/dist/list.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/quill/dist/quill.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="{{asset('org/Dashkit/assets')}}/libs/select2/dist/js/select2.min.js"></script>

<!-- Theme JS -->
<script src="{{asset('org/Dashkit/assets')}}/js/theme.min.js"></script>
@include('layouts.hdjs')
@include('layouts.message')
@stack('js')
</body>
</html>