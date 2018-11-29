@extends('home.layouts.master')
@section('content')
    <div class="main-content">

        <!-- HEADER -->
@include('member.layouts.menu')

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


                    </div>
                </div> <!-- / .row -->

                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
                        <div class="row listAlias">
                            {{--循环体--}}
                            @foreach($likesData as $like)
                                <div class="col-12 col-md-6 col-xl-3">
                                    <!-- Card -->
                                    <div class="card">
                                        <a href="{{route('home.article.show',$like->belongsModel)}}">
                                            <img src="{{asset('org/Dashkit/assets')}}/img/avatars/projects/project-1.jpg"
                                                 alt="..." class="card-img-top">
                                        </a>
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col" style="overflow: hidden">

                                                    <!-- Title -->
                                                    <h4 class="card-title mb-2 name" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                                        <a href="{{route('home.article.show',$like->belongsModel)}}">{{$like->belongsModel->title}}</a>
                                                    </h4>

                                                    <!-- Subtitle -->
                                                    <p class="card-text small text-muted">
                                                        {{$like->belongsModel->created_at->diffForHumans()}}
                                                    </p>

                                                </div>
                                            </div> <!-- / .row -->

                                            <!-- Divider -->
                                            <hr>

                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col-auto">

                                                            <div class="small mr-2">{{$like->belongsModel->category->title}}</div>

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
                                                        <a href="{{route('member.user.show',$like->belongsModel->user)}}" class="avatar avatar-xm"
                                                           data-toggle="tooltip" title="{{$like->belongsModel->user->name}}">
                                                            <img src="{{$like->belongsModel->user->icon}}" alt="..."
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

                </div> <!-- / .tab-content -->
                {{$likesData->appends(['type'=>Request::query('type')])->links()}}


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