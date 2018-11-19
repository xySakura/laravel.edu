
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
    <link rel="stylesheet" href="{{asset('org/Dashkit/assets')}}/css/theme.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>登陆</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

            <!-- Image -->
            <div class="text-center">
                <img src="{{asset('org/Dashkit/assets')}}/img/illustrations/happiness.svg" alt="..." class="img-fluid">
            </div>

        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                登陆
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                开启新世界的大门吧
            </p>

            <!-- Form -->
            <form action="{{route('login')}}" method="post">
                @csrf
                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label>邮箱</label>

                    <!-- Input -->
                    <input type="email"  name="email" class="form-control" placeholder="请填写邮箱" value="{{old('email')}}">

                </div>

                <!-- Password -->
                <div class="form-group">

                    <div class="row">
                        <div class="col">

                            <!-- Label -->
                            <label>密码</label>


                        </div>
                        <div class="col-auto">

                            <!-- Help text -->
                            <a href="{{route('passwordReset')}}" class="form-text small text-muted">
                                忘记密码?
                            </a>

                        </div>
                    </div> <!-- / .row -->

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input type="password"  name="password" class="form-control" placeholder="请输入密码">

                    </div>
                </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                        <label class="form-check-label" for="remember">记住我</label>
                    </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3 mt-3">
                    登陆
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        Don't have an account yet? <a href="sign-up-illustration.html">Sign up</a>.
                    </small>
                </div>

            </form>

        </div>
    </div> <!-- / .row -->
</div> <!-- / .container -->

<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
@include('layouts.message')

<!-- Libs JS -->


</body>
</html>