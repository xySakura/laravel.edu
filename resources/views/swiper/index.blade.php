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
                                <a href="{{route('wechat.menu.index')}}" class="nav-link active">
                                    图片列表
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    图片管理
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('swiper.swiper.create')}}" class="btn btn-primary">
                            添加图片
                        </a>

                    </div>
                </div>
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($swipers as $swiper)
                    <div class="swiper-slide">
                        <div class="col">
                            <img src="{{$swiper->icon}}" alt="{{$swiper->url}}">
                            <!-- Title -->
                            <!-- Subtitle -->
                            <div class="col-auto">
                                <!-- Dropdown -->
                                <div class="dropdown mt-3">
                                    <a href="#" class=" dropdown-toggle btn btn-primary" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">操作
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-170px, 25px, 0px);">
                                        <a href="{{route('swiper.swiper.edit',$swiper)}}" class="dropdown-item">
                                            编辑
                                        </a>
                                        <a href="#" class="dropdown-item" onclick="del(this)">
                                            删除
                                        </a>
                                        <form action="{{route('swiper.swiper.destroy',$swiper)}}" method="post">
                                            @csrf @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- / .card-body -->
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>




    </div> <!-- / .container-fluid -->


@endsection
@push('css')
    <style>
        html, body {
            position: relative;
            height: 100%;
        }

        .swiper-container {
            width: 100%;
            height: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>
@endpush
@push('js')
    <script>
        window.onload = function () {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        }

    </script>

    <script>

        function choose() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    $('input[name=icon]').val(icon)
                    $('#icon').addClass(icon)
                })
            })
        }

        function del(obj) {
            require(['hdjs', 'bootstrap'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(obj).next('form').submit();
                })
            })
        }
    </script>
@endpush