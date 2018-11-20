<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/css/theme.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <title>PikaPika</title>
</head>
<body>

<!-- TOPNAV================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="index.html">
            <img src="{{asset('org/Dashkit/assets')}}/img/logo.svg" alt="..." class="navbar-brand-img">
        </a>

        <!-- Form -->
        <form class="form-inline mr-4 d-none d-lg-flex">
            <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Input -->
                <input type="search" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fe fe-search"></i>
                    </div>
                </div>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-card">
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush list my--3">
                            <a href="team-overview.html" class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Airbnb
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->
                            </a>
                            <a href="team-overview.html" class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Medium Corporation
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->
                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-4by3">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Homepage Redesign
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-4by3">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Travels & Time
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-4by3">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Safari Exploration
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="profile-posts.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Dianna Smiley
                                        </h4>

                                        <!-- Status -->
                                        <p class="text-body small mb-0">
                                            <span class="text-success">●</span> Online
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="profile-posts.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Ab Hadley
                                        </h4>

                                        <!-- Status -->
                                        <p class="text-body small mb-0">
                                            <span class="text-danger">●</span> Offline
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                        </div>

                    </div>
                </div> <!-- / .dropdown-menu -->

            </div>
        </form>

        <!-- User -->
        <div class="navbar-user">

            <!-- Dropdown -->
            <div class="dropdown mr-4 d-none d-lg-flex">

                <!-- Toggle -->
                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon active">
                <i class="fe fe-bell"></i>
              </span>
                </a>

                <!-- Menu -->


            </div>

            <!-- 用户头像******************************************************** -->
            <div class="dropdown">
            @auth()
                <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="" class="dropdown-item">{{auth()->user()->name}}</a>
                        <a href="{{route('home.article.index')}}" class="dropdown-item">我的文章</a>
                        @can('view',auth()->user())
                            <a href="{{route('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endcan
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">注销登录</a>
                    </div>
                @else
                    <a href="{{route('login')}}" class="btn btn-white btn-sm">登录</a>
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
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavPages">
                        <li class="dropright">
                            <a class="dropdown-item dropdown-toggle" href="#!" id="topnavProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnavProfile">
                                <a class="dropdown-item" href="profile-posts.html">
                                    Posts
                                </a>
                                <a class="dropdown-item" href="profile-groups.html">
                                    Groups
                                </a>
                                <a class="dropdown-item" href="profile-projects.html">
                                    Projects
                                </a>
                                <a class="dropdown-item" href="profile-files.html">
                                    Files
                                </a>
                                <a class="dropdown-item" href="profile-subscribers.html">
                                    Subscribers
                                </a>
                            </div>
                        </li>
                        <li class="dropright">
                            <a class="dropdown-item dropdown-toggle" href="#!" id="topnavProject" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Project
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnavProject">
                                <a class="dropdown-item" href="project-overview.html">
                                    Overview
                                </a>
                                <a class="dropdown-item" href="project-files.html">
                                    Files
                                </a>
                                <a class="dropdown-item" href="project-reports.html">
                                    Reports
                                </a>
                                <a class="dropdown-item" href="project-new.html">
                                    New project
                                </a>
                            </div>
                        </li>
                        <li class="dropright">
                            <a class="dropdown-item dropdown-toggle" href="#!" id="topnavTeam" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Team
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnavTeam">
                                <a class="dropdown-item" href="team-overview.html">
                                    Overview
                                </a>
                                <a class="dropdown-item" href="team-project.html">
                                    Project
                                </a>
                                <a class="dropdown-item" href="team-members.html">
                                    Members
                                </a>
                                <a class="dropdown-item" href="team-new.html">
                                    New team
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="orders.html">
                                Orders
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="feed.html">
                                Feed
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="settings.html">
                                Settings
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="invoice.html">
                                Invoice
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pricing.html">
                                Pricing
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('home.article.index')}}" id="topnavAuth" >
                        文章列表
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavLayouts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <a class="dropdown-item dropdown-toggle" href="#!" id="topnavDashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavDocumentation" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                Copyright © 2010-2018 houdunren.com All Rights Reserved
                京ICP备12048441号-3
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