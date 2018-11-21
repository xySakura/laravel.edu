<div class="header">

    <!-- Image -->
    <div style="height: 300px;overflow: hidden">
        <img src="{{asset('svg/bgpic.jpg')}}" class="header-img-top" alt="..." style="">
    </div>

    <div class="container-fluid">

        <!-- Body -->
        <div class="header-body mt--5 mt-md--6">
            <div class="row align-items-end">
                <div class="col-auto">

                    <!-- Avatar -->
                    <div class="avatar avatar-xxl header-avatar-top">
                        <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle border border-body">
                    </div>

                </div>
                <div class="col mb-3 ml--3 ml-md--2">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        Members
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        {{$user->name}}
                    </h1>

                </div>
                <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">

                    <!-- Button -->
                    @can('isMine',$user)
                    <a href="{{route('home.article.create')}}" class="btn btn-primary d-block d-md-inline-block">
                        发表文章
                    </a>
                    @endcan

                </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
                <div class="col">

                    <!-- Nav -->
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                        <li class="nav-item">
                            <a href="{{route('member.user.show',$user)}}" class="nav-link active">
                                @if(auth()->id() == $user->id)我@else他@endif的文章
                            </a>
                        </li>
                        @can('isMine',$user)
                        <li class="nav-item">
                            <a href="{{route('member.user.edit',[$user,'type'=>'name'])}}" class="nav-link ">
                                修改资料
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.user.edit',[$user,'type'=>'icon'])}}" class="nav-link">
                                上传头像
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="profile-files.html" class="nav-link">
                                Files
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.user.edit',[$user,'type'=>'password'])}}" class="nav-link">
                                重置密码
                            </a>
                        </li>
                        @endcan
                    </ul>

                </div>
            </div>
        </div> <!-- / .header-body -->

    </div>
</div>