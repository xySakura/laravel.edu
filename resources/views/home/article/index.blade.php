@extends('home.layouts.master')
@section('content')
    <div class="main-content mt-7">

        <!-- HEADER -->
        <div class="header">

            <!-- Image -->
            <div class="container-fluid">

                <!-- Body -->
                <div class="header-body mt--5 mt-md--6">

                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <h2>文章列表</h2>
                                </li>
                            </ul>

                        </div>
                        <div class="dropdown mr-7">
                            <!-- Toggle -->
                            <a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                                筛选
                            </a>
                            <!-- Menu -->
                            <div class="dropdown-menu">
                                @foreach($categories as $category)
                                    <a class="dropdown-item sort"  href="{{route('home.article.index',['category'=>$category['id']])}}">
                                        {{$category['title']}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div> <!-- / .header-body -->


            </div>
        </div>

        <!-- CONTENT -->
        <div data-toggle="lists" data-lists-values='["name"]'>
            <div class="container-fluid" data-toggle="lists" data-lists-class="listAlias" data-lists-values='["name"]'>
                <div class="row mb-4">
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
                    <div class="col-auto">

                        <!-- Navigation (button group) -->
                        <div class="nav btn-group" role="tablist">
                            <button class="btn btn-lg btn-white active" data-toggle="tab" data-target="#tabPaneOne"
                                    role="tab" aria-controls="tabPaneOne" aria-selected="true">
                                <span class="fe fe-grid"></span>
                            </button>
                            <button class="btn btn-lg btn-white" data-toggle="tab" data-target="#tabPaneTwo" role="tab"
                                    aria-controls="tabPaneTwo" aria-selected="false">
                                <span class="fe fe-list"></span>
                            </button>
                        </div> <!-- / .nav -->

                    </div>
                </div> <!-- / .row -->

                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
                        <div class="row listAlias">
                            {{--循环体--}}
                            @foreach($articles as $article)
                                <div class="col-12 col-md-6 col-xl-3">

                                    <!-- Card -->
                                    <div class="card">
                                        <a href="{{route('home.article.show',$article)}}">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/projects/project-1.jpg"
                                                 alt="..." class="card-img-top">
                                        </a>
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col" style="overflow: hidden;">

                                                    <!-- Title -->
                                                    <h4 class="card-title mb-2 name" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                                        <a href="{{route('home.article.show',$article)}}">{{$article->title}}</a>
                                                    </h4>

                                                    <!-- Subtitle -->
                                                    <p class="card-text small text-muted">
                                                        {{$article->created_at->diffForHumans()}}
                                                    </p>

                                                </div>
                                                <div class="col-auto">

                                                    @can('view',auth()->user())
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <a href="#!" class="dropdown-ellipses dropdown-toggle"
                                                           role="button" data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{route('home.article.show',$article)}}"
                                                               class="dropdown-item">
                                                                查看详情
                                                            </a>

                                                                <a href="{{route('home.article.edit',$article)}}"
                                                                   class="dropdown-item">
                                                                    编辑
                                                                </a>

                                                                <a href="javascript:;" onclick="del(this)"
                                                                   class="dropdown-item">
                                                                    删除
                                                                </a>
                                                                <form action="{{route('home.article.destroy',$article)}}"
                                                                      method="post">
                                                                    @csrf @method('DELETE')
                                                                </form>
                                                        </div>
                                                    </div>
                                                    @endcan

                                                </div>
                                            </div> <!-- / .row -->

                                            <!-- Divider -->
                                            <hr>

                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col-auto">

                                                            <div class="small mr-2">{{$article->category->title}}</div>

                                                        </div>
                                                        {{--<div class="col">--}}

                                                        {{--<!-- Progress -->--}}
                                                        {{--<div class="progress progress-sm">--}}
                                                        {{--<div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                        {{--</div>--}}

                                                        {{--</div>--}}
                                                    </div> <!-- / .row -->
                                                </div>
                                                <div class="col-auto">

                                                    <!-- Avatar group -->
                                                    <div class="avatar-group">
                                                        <a href="{{route('member.user.show',$article->user)}}" class="avatar avatar-xm"
                                                           data-toggle="tooltip" title="{{$article->user->name}}">
                                                            <img src="{{$article->user->icon}}" alt="..."
                                                                 class="avatar-img rounded-circle border border-white">
                                                        </a>
                                                    </div>

                                                </div>
                                            </div> <!-- / .row -->

                                        </div> <!-- / .card-body -->
                                    </div>

                                </div>
                            @endforeach

                        </div> <!-- / .row -->
                    </div>
                    <div class="tab-pane fade" id="tabPaneTwo" role="tabpanel">
                        @foreach($articles as $article)
                            <div class="row list">
                                <div class="col-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">

                                                    <!-- Avatar -->
                                                    <a href="{{route('home.article.show',$article)}}"
                                                       class="avatar avatar-lg avatar-4by3">
                                                        <img src="{{asset('org/Dashkit/assets')}}/img/avatars/projects/project-1.jpg"
                                                             alt="..." class="avatar-img rounded">
                                                    </a>

                                                </div>
                                                <div class="col ml--2">

                                                    <!-- Title -->

                                                        <h4 class="card-title mb-1 name" style="width: 90%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                                            <a href="{{route('home.article.show',$article)}}">{{$article->title}}</a>
                                                        </h4>


                                                    <!-- Text -->
                                                    <p class="card-text small text-muted mb-1">
                                                        <time datetime="2018-06-21">{{$article->created_at->diffForHumans()}}</time>
                                                    </p>

                                                    <!-- Progress -->
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col-auto">

                                                            <div class="small mr-2">{{$article->category->title}}</div>

                                                        </div>
                                                        {{--<div class="col">--}}

                                                        {{--<!-- Progress -->--}}
                                                        {{--<div class="progress progress-sm">--}}
                                                        {{--<div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                        {{--</div>--}}

                                                        {{--</div>--}}
                                                    </div> <!-- / .row -->

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Avatar group -->
                                                    <div class="avatar-group d-none d-md-inline-flex">
                                                        <a href="{{route('member.user.show',$article->user)}}" class="avatar avatar-xm"
                                                           data-toggle="tooltip" title="{{$article->user->name}}">
                                                            <img src="{{$article->user->icon}}"
                                                                 class="avatar-img rounded-circle border border-white"
                                                                 alt="...">
                                                        </a>

                                                    </div>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Dropdown -->
                                                @can('view',auth()->user())
                                                    <!-- Dropdown -->
                                                        <div class="dropdown">
                                                            <a href="#!" class="dropdown-ellipses dropdown-toggle"
                                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                                               aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="{{route('home.article.show',$article)}}"
                                                                   class="dropdown-item">
                                                                    查看详情
                                                                </a>

                                                                <a href="{{route('home.article.edit',$article)}}"
                                                                   class="dropdown-item">
                                                                    编辑
                                                                </a>

                                                                <a href="javascript:;" onclick="del(this)"
                                                                   class="dropdown-item">
                                                                    删除
                                                                </a>
                                                                <form action="{{route('home.article.destroy',$article)}}"
                                                                      method="post">
                                                                    @csrf @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endcan

                                                </div>
                                            </div> <!-- / .row -->
                                        </div> <!-- / .card-body -->
                                    </div>

                                </div>


                            </div> <!-- / .row -->
                        @endforeach
                    </div>
                </div> <!-- / .tab-content -->
                {{$articles->appends(['category' => Request::query('category')])->links()}}

            </div> <!-- / .container-fluid -->

        </div>


    </div> <!-- / .main-content -->

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