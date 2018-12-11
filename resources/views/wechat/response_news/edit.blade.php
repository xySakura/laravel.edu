@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            图文回复
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('wechat.response_news.index')}}" class="nav-link ">
                                    回复列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('wechat.response_news.create')}}" class="nav-link active">
                                    添加回复
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{route('wechat.response_news.create')}}" class="btn btn-white btn-sm">
                            添加回复
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <form action="{{route('wechat.response_news.update',$responseNews)}}" method="post">
            @csrf
           @method('PUT')
            {!! $ruleView !!}

            <div class="card" id="app">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="news">
                                <img :src="news.picurl" alt="">
                                <div class="box">
                                    <p class="title">@{{ news.title }}</p>
                                    <p class="des">@{{ news.discription }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">图文标题</label>
                                <input type="text" v-model="news.title" class="form-control" id="exampleInputEmail1"
                                       placeholder="标题">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">图文描述</label>
                                <textarea class="form-control" v-model="news.discription" placeholder="内容"></textarea>
                            </div>
                            <label for="exampleInputEmail1">图片</label>
                            <div class="input-group mb-3">
                                <div class="input-group mb-1">
                                    <input class="form-control  " v-model="news.picurl" readonly="" value="">
                                    <div class="input-group-append">
                                        <button @click="upImagePc" class="btn btn-secondary" type="button">单图上传</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">跳转 url</label>
                                <input type="text" v-model="news.url" class="form-control" placeholder="跳转地址">
                            </div>
                        </div>
                    </div>
                </div>
                <textarea hidden name="data" id="" cols="30" rows="10">@{{ news }}</textarea>
            </div>
            <button class="btn btn-primary">保存数据</button>
        </form>

    </div>
@endsection
@push('css')
    <style>
        .news {
            border: 1px solid #cccccc;
            border-radius: 5px;

        }

        .news img {
            display: block;
            width: 100%;

        }

        .news .box{
            /*box-shadow: 0 0 3px #000 ;*/
            border-top: 1px solid #cccccc;
            border-radius: 5px;
        }

        .news .title {
            width: 100%;
            background: white;
            color: black;
            margin: 0;
            font-size: 20px;
            padding-left: 15px;
            padding-top: 5px;
        }

        .news .des{
            width: 100%;
            background: white;
            color: #cccccc;
            margin: 0;
            font-size: 16px;
            padding-left: 15px;
            padding-top: 5px;
        }
    </style>
@endpush
@push('js')
    <script>
        require(['vue', 'hdjs'], function (Vue, hdjs) {
            new Vue({
                el: '#app',
                data: {
                    news: {!! $responseNews['data'] !!}
                },
                methods: {
                    upImagePc() {
                        hdjs.image((images) => {
                            //上传成功的图片，数组类型
                            this.news.picurl = images[0];
                        })
                    }
                }
            })

        })
    </script>
@endpush
