<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="{{ url('template/l/layout_2-ltr-default') }}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name','GovMail') }}</title>
    <link rel="icon" href="/images/favico-logo.png" type="image/x-icon" >

    <!-- Global stylesheets -->
    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="/templates/l/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-1/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-1/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-1/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-1/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-1/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="/templates/l/global_assets/js/main/jquery.min.js"></script>
    <script src="/templates/l/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/templates/l/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/pickers/daterangepicker.js"></script>

    <script src="/templates/l/layout-1/assets/js/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<style>
    .bg-image{
        background-image: url("/background_image/kampala.jpg") !important;
        /*background-repeat: no-repea;*/
        background-size: cover;
    }
</style>

<!-- Page content -->
<div id="app" class="page-content bg-image">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex p-0 ">

            <div class="row">

                <div class="col-lg-4 d-md-flex justify-content-center align-items-center bg-white">
                    <!-- Login card -->
                    <form class="login-form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="text-center mb-3">
                                {{--<i class="icon-stats-bars2 icon-2x rounded-round p-3 mb-3 mt-1"></i>--}}
                                <img src="/images/logo.png" class="p-3 mb-3 mt-1" alt="" width="200" >
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Your credentials</span>
                            </div>

                            @if (session('message'))
                                <div class="alert alert-danger">{{ session('message') }}</div>
                            @endif

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text"
                                       class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}"
                                       placeholder="Email"
                                       name="email"
                                       value="{{ old('email') }}" required>
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                @if($errors->has('email'))
                                    <label id="username-error" class="validation-invalid-label" for="username">{{$errors->first('email')}}</label>
                                @endif
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password"
                                       class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}"
                                       placeholder="Password"
                                       name="password" required>
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
                                        Remember
                                    </label>
                                </div>

                                <a href="{{ route('password.request') }}" class="ml-auto">Forgot password?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in<i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            {{--
                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">or sign in with</span>
                            </div>

                            <div class="form-group text-center">
                                <button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>
                                <button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button>
                                <button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button>
                                <button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button>
                            </div>
                            --}}

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2 bg-dark">Don't have an account?</span>
                            </div>

                            <div class="form-group">
                                <a href="/register" class="btn btn-dark btn-block border-light">Sign up now</a>
                            </div>

                            <span class="form-text text-center text-muted">
                                By continuing, you're confirming that you've read our
                                <a href="#">Terms &amp; Conditions</a> and
                                <a href="#">Cookie Policy</a>
                            </span>
                        </div>
                    </form>
                    <!-- /login card -->
                </div>

                <div class="col-lg-8 d-none d-md-flex justify-content-center align-items-center">

                    <div class="d-block">
                        <div class="row">
                            <div class="d-block" style="font-size: 300%">Electronic Government Procurement</div>
                        </div>
                        <div class="row">
                            <div class="d-block font-weight-bolder" style="font-size: 900%">EGP Uganda</div>
                        </div>
                        <div class="row">
                            <div class="font-weight-bold font-italic ml-auto" style="font-size: 150%">Developing Uganda together</div>
                        </div>
                    </div>


                </div>

            </div>



        </div>
        <!-- /content area -->


        <!-- Footer -->

        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
