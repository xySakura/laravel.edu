@extends('home.layouts.master')
@section('content')
    <div class="main-content">

        <!-- HEADER -->
        @include('member.layouts.menu')

        <div class="main-content">

            <!-- CONTENT -->
            <div class="container-fluid">
                @if($followers->count() == 0)
                    <p class="text-muted text-center p-5">暂无粉丝</p>
                @else
                <div class="row">
                        @foreach($followers as $follower)
                            <div class="col-12 col-md-6 col-xl-3">

                                <!-- Card -->
                                <div class="card">

                                    <div class="card-body text-center">

                                        <a href="{{route('member.user.show',$follower)}}"
                                           class="avatar avatar-xl card-avatar ">
                                            <img src="{{$follower->icon}}"
                                                 class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>

                                        <h2 class="card-title">
                                            <a href="{{route('member.user.show',$follower)}}">{{$follower->name}}</a>
                                        </h2>

                                        <p class="card-text text-muted">
                                            <small>
                                                Working on the latest API integration.
                                            </small>
                                        </p>

                                        <p class="card-text">
                                            <span class="badge badge-soft-secondary">
                                                <a href="{{route('member.following',$follower)}}">关注 {{count($follower->following)}}</a>
                                            </span>
                                            <span class="badge badge-soft-secondary">
                                                <a href="{{route('member.followed',$follower)}}">粉丝 {{count($follower->followed)}}</a>
                                            </span>
                                        </p>
                                        @auth()
                                        <hr>
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col-auto">

                                                    @if(auth()->user()->id == $follower->id)
                                                        <a href="#" class="btn btn-white btn-block btn-xs disabled" >
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                    <a class="btn btn-white btn-block btn-xs" href="{{route('member.follow',$follower)}}">
                                                        @if(auth()->user()->followed->contains($follower) && auth()->user()->following->contains($follower))
                                                            <i class="fa fa-heart" aria-hidden="true"></i> 互相关注
                                                        @elseif(auth()->user()->following->contains($follower))
                                                            <i class="fa fa-remove" aria-hidden="true"></i> 取消关注
                                                        @else
                                                            <i class="fa fa-plus" aria-hidden="true"></i> 关注 TA
                                                        @endif
                                                    </a>
                                                    @endif
                                            </div>
                                        </div>
                                        @endauth

                                    </div>

                                </div>

                            </div>
                        @endforeach
                @endif


                </div>
                {{$followers->links()}}
            </div> <!-- / .container-fluid -->


        </div> <!-- / .main-content -->


    </div> <!-- / .main-content -->

@endsection
