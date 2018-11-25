
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/css/theme.min.css">

    <title>注册</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                注 &nbsp  &nbsp  &nbsp  &nbsp  册
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                let's go change the world
            </p>

            <!-- Form -->
            <form action="{{route('register')}}" method="post">
                @csrf

                {{--用户名--}}
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        用户名
                    </label>

                    <!-- Input -->
                    <input type="text"  name="name" class="form-control" placeholder="请输入用户名" value="{{old('name')}}">

                </div>

                {{--密码--}}
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        密码
                    </label>

                    <!-- Input -->
                    <input type="password"  name="password" class="form-control" placeholder="请输入密码">

                </div>

                <div class="form-group">

                    <!-- Label -->
                    <label>
                        确认密码
                    </label>

                    <!-- Input -->
                    <input type="password"  name="password_confirmation" class="form-control" placeholder="请再次输入密码，两次输入保持一致">

                </div>

                {{--邮箱--}}
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        邮箱
                    </label>

                    <!-- Input -->
                    <input type="email"  name="email" class="form-control" placeholder="请填写邮箱" value="">

                </div>

                {{--验证码--}}
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        验证码
                    </label>

                    <!-- Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="请输入验证码" name="code"  aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="bt">发送验证码</button>
                        </div>
                    </div>

                </div>





                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                   注 &nbsp     &nbsp  &nbsp  &nbsp         册
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        Already have an account? <a href="{{route('login')}}">Log in</a>.
                    </small>
                </div>

            </form>

        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

            <!-- Image -->
            <div class="bg-cover vh-100 mt--1 mr--3" style="background-image: url({{asset('org/Dashkit/assets')}}/img/covers/auth-side-cover.jpg);"></div>

        </div>
    </div> <!-- / .row -->
</div>

<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('util.code.send')}}',
            //验证码等待发送时间
            timeout: 10,
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]'
        };
        hdjs.validCode(option);
    })
</script>



</body>
</html>