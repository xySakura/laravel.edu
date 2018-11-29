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
                                <div class="col-12 col-md-6 col-xl-4">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">

                                            <!-- Header -->
                                            <div class="mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">

                                                        <!-- Avatar -->
                                                        <a href="{{route('member.user.show',$like->belongsModel->article->user)}}" class="avatar">
                                                            <img src="{{$like->belongsModel->article->user->icon}}" alt="..." class="avatar-img rounded-circle">
                                                        </a>

                                                    </div>
                                                    <div class="col ml--2">

                                                        <!-- Title -->
                                                        <h4 class="card-title mb-1">
                                                            {{$like->belongsModel->article->user->name}}
                                                        </h4>

                                                        <!-- Time -->
                                                        <p class="card-text small text-muted">
                                                            <span class="fe fe-clock"></span>{{$like->belongsModel->article->created_at->diffForHumans()}}
                                                        </p>

                                                    </div>
                                                </div> <!-- / .row -->
                                            </div>

                                            <!-- Text -->

                                            <!-- Image -->
                                            <p class="text-center mb-3">
                                                <a href="{{route('home.article.show',$like->belongsModel->article)}}">
                                                    <img src="{{asset('org/Dashkit/assets')}}/img/posts/post-1.jpg" alt="..." class="img-fluid rounded">
                                                </a>
                                            </p>

                                            <!-- Buttons -->


                                            <!-- Divider -->
                                            <hr>

                                            <!-- Comments -->

                                            <div class="comment mb-3" >
                                                <div class=" col-12">
                                                        <!-- Body -->
                                                        <div class="comment-body col-12" >

                                                            <div class="row">
                                                                <div class="col">

                                                                    <!-- Title -->
                                                                    <h5 class="comment-title">
                                                                       {{$like->belongsModel->user->name}}
                                                                    </h5>

                                                                </div>
                                                                <div class="col-auto">

                                                                    <!-- Time -->
                                                                    <time class="comment-time">
                                                                        {{$like->belongsModel->created_at->diffForHumans()}}
                                                                    </time>

                                                                </div>
                                                            </div> <!-- / .row -->

                                                            <!-- Text -->
                                                            <div class="col">
                                                                <p class="comment-text" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                                                    {{$like->belongsModel->content}}
                                                                </p>
                                                            </div>
                                                    </div>
                                                </div> <!-- / .row -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach


                        </div> <!-- / .row -->
                    </div>

                </div> <!-- / .tab-content -->
                {{$likesData->links()}}


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