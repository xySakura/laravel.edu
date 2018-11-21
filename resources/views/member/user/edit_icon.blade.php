@extends('home.layouts.master')
@section('content')
    <div class="main-content">
        {{--*******************************头部*******************************--}}
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
                                    <a href="{{route('member.user.show',$user)}}" class="nav-link ">
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
                                        <a href="{{route('member.user.edit',[$user,'type'=>'icon'])}}" class="nav-link active">
                                            上传头像
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="profile-files.html" class="nav-link">
                                            Files
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('member.user.edit',[$user,'type'=>'password'])}}" class="nav-link ">
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

        {{--*******************************头部*******************************--}}


        <div class="col-sm-12 mb-4">
            <div class="row justify-content-center  __web-inspector-hide-shortcut__">

                <input type="hidden" name="_token" value="meB8V3w51M6Fv2HJh2u70JUOzWk9CeaN2PFfdCeA">            <input type="hidden" name="_method" value="PUT">            <div class="card">
                    <div class="card-header">
                        <h4>头像设置</h4>
                    </div>
                    <div class="card-body  text-center">

                        <div class="avatar avatar-xxl mb-2" style="cursor: pointer" onclick="upImagePc(this)">
                            <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <br>
                        <span class="help-block text-muted small">请上传 200X200 像素并小于200KB的JPG图片</span>
                    </div>
                </div>
                <form action="{{route('member.user.update',$user)}}" method="post" class="col-sm-8" id="form-icon">
                    @csrf @method('PUT')
                </form>
            </div>

        </div>





    </div>

@endsection
@push('js')
    {{--hdjs里面上传需要再控制台--network中检测数据--}}
    {{--处理上传之前需要创建处理上传控制器方法、配置对应的路由--}}
    {{--需要修改hdjs上传配置项：hdjs.blade.php--}}
    {{--还需要注意上传419状态码--}}
    <script>
        require(['hdjs','bootstrap']);
        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    alert(1);
                    //上传成功的图片，数组类型
                    // $("[name='thumb']").val(images[0]);
                    // $(".img-thumbnail").attr('src', images[0]);
                }, options)
            });
        }
        //移除图片
        function removeImg(obj) {
            $(obj).prev('img').attr('src', '../dist/static/image/nopic.jpg');
            $(obj).parent().prev().find('input').val('');
        }
    </script>
@endpush