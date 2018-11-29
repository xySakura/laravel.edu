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
                    <h1 class="header-title">
                        {{$user->name}}
                    </h1>
                    <h5 class="header-pretitle mt-2">
                        <a href="{{route('member.following',$user)}}">关注 {{count($user->following)}}</a> | <a href="{{route('member.followed',$user)}}">粉丝 {{count($user->followed)}}</a>
                    </h5>

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
                    {{--*******************************************-关注粉丝********************************************--}}
                    @if(active_class(if_route(['member.following'])) || active_class(if_route(['member.followed'])))
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                        <li class="nav-item">
                            <a href="{{route('member.user.show',$user)}}" class="nav-link {{active_class(if_route(['member.user.show']))}}">
                                @if(auth()->id() == $user->id)我@else他@endif的主页
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.following',$user)}}" class="nav-link {{active_class(if_route(['member.following']))}}">
                                @if(auth()->id() == $user->id)我@else他@endif的关注
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.followed',$user)}}" class="nav-link {{active_class(if_route(['member.followed']))}}">
                                @if(auth()->id() == $user->id)我@else他@endif的粉丝
                            </a>
                        </li>
                    </ul>
                        {{--*******************************************点赞********************************************--}}
                    @elseif(active_class(if_route(['member.mylike'])) )
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('member.user.show',$user)}}" class="nav-link {{active_class(if_route(['member.user.show']))}}">
                                    @if(auth()->id() == $user->id)我@else他@endif的主页
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('member.mylike',[$user,'type'=>'article'])}}" class="nav-link {{active_class(if_route(['member.mylike']) && if_query('type', 'article'), 'active', '')}}">
                                    点赞文章
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('member.mylike',[$user,'type'=>'comment'])}}" class="nav-link {{active_class(if_route(['member.mylike']) && if_query('type', 'comment'), 'active', '')}}">
                                    点赞评论
                                </a>
                            </li>
                        </ul>
                        {{--*******************************************设置*******************************************--}}
                    @elseif(active_class(if_route(['member.user.edit'])))
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                        <li class="nav-item">
                            <a href="{{route('member.user.show',$user)}}" class="nav-link {{active_class(if_route(['member.user.show']))}}">
                                @if(auth()->id() == $user->id)我@else他@endif的主页
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.user.edit',[$user,'type'=>'name'])}}" class="nav-link {{active_class(if_route(['member.user.edit']) && if_query('type', 'name'), 'active', '')}}">
                                修改资料
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.user.edit',[$user,'type'=>'icon'])}}" class="nav-link {{active_class(if_route(['member.user.edit']) && if_query('type', 'icon'), 'active', '')}}">
                                上传头像
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.user.edit',[$user,'type'=>'password'])}}" class="nav-link {{active_class(if_route(['member.user.edit']) && if_query('type', 'password'), 'active', '')}}">
                                重置密码
                            </a>
                        </li>
                        </ul>
                        {{--*******************************************主页********************************************--}}
                    @else
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                        <li class="nav-item">
                            <a href="{{route('member.user.show',$user)}}" class="nav-link {{active_class(if_route(['member.user.show']))}}">
                                @if(auth()->id() == $user->id)我@else他@endif的主页
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.mylike',[$user,'type'=>'article'])}}" class="nav-link">
                                @if(auth()->id() == $user->id)我@else他@endif的点赞
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('member.mycollect',$user)}}" class="nav-link">
                                @if(auth()->id() == $user->id)我@else他@endif的收藏
                            </a>
                        </li>
                        @can('isMine',$user)
                            <li class="nav-item">
                                <a href="{{route('member.notify',$user)}}" class="nav-link {{active_class(if_route(['member.notify']))}}">
                                    我的通知
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('member.user.edit',[$user,'type'=>'name'])}}" class="nav-link {{active_class(if_route(['member.user.edit']) && if_query('type', 'name'), 'active', '')}}">
                                    我的设置
                                </a>
                            </li>
                        @endcan
                    </ul>
                    @endif
                </div>
            </div>
        </div> <!-- / .header-body -->

    </div>
</div>