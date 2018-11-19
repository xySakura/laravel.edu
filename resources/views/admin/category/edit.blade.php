@extends('admin.layouts.master')
@section('content')
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    文章列表
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!-- / .header-body -->

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('admin.category.update',$category)}}">
                            @csrf   @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">文章标题</label>
                                <input type="text" name="title" value="{{$category['title']}}" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">文章小标题</label>
                                <input type="text" name="stitle"  value="{{$category['stitle']}}" class="form-control" id="exampleInputEmail1"
                                       placeholder="">
                            </div>

                            <label for="exampleInputEmail1">栏目图标</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text {{$category['icon']}}" id="icon"></span>
                                </div>
                                <input type="text"   readonly value="{{$category['icon']}}" name="icon" class="form-control"
                                       aria-label="Amount (to the nearest dollar) ">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="choose()" style="cursor: pointer">选择图标</span>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-primary">重置</button>
                            <button type="submit" class="btn btn-primary" style="float: right">保存</button>
                        </form>
                    </div>
                </div>


            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container-fluid -->

@endsection
@push('js')
    <script>
        function choose() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    //alert(icon)
                    $('input[name=icon]').val(icon)
                    $('#icon').addClass(icon)
                })
            })
        }
    </script>
@endpush