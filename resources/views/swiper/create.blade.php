@extends('admin.layouts.master')
@section('content')
    <!-- HEADER -->
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('wechat.menu.index')}}" class="nav-link ">
                                    图片列表
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    图片管理
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('swiper.swiper.create')}}" class="btn btn-primary" >
                            添加图片
                        </a>

                    </div>
                </div>
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="row">
            <div class="card col-12">
                <div class="col-12">
                    <div class="row justify-content-center  __web-inspector-hide-shortcut__">
                        <form action="{{route('swiper.swiper.store')}}" method="post" class="col-sm-8" id="form-icon">
                            @csrf
                            <div class="card-body">

                                <div class="col-sm-8">
                                    <div class="input-group mb-1">
                                        <input type="text" name="icon" value="" class="form-control ">
                                        <div class="input-group-append">
                                            <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">上传图片</button>
                                        </div>
                                    </div>
                                    <div style="display: inline-block;position: relative;">
                                        <img src="" class="img-responsive img-thumbnail" width="500">
                                    </div>
                                </div>


                                <div class="form-group mt-3">
                                    <label>图片跳转连接</label>
                                    <input type="text" class="form-control " name="url" value="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm">确定</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div> <!-- / .row -->

    </div> <!-- / .container-fluid -->


@endsection
@push('js')
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
                    // alert(1);
                    $("[name='icon']").val(images[0])
                    $(".img-responsive ").attr('src', images[0]);
                    // $('#editIcon').submit();
                }, options)
            });
        }
    </script>
@endpush