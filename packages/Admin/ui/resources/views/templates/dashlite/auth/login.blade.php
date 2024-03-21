<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/images/logo.png">
    <!-- Page Title  -->
    <title>{{ config('app.name', 'GovMail') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="/templates/d-main/assets/css/dashlite.css?ver=1.9.2">
    <link id="skin-default" rel="stylesheet" href="/templates/d-main/assets/css/theme.css?ver=1.9.2">
</head>
<style>
    .shadow {
        shadow: 0px 50px 145px;
        box-shadow: 0px 50px 145px;
        -moz-box-shadow: 0px 50px 145px;
        -webkit-box-shadow: 0px 50px 145px;
    }
</style>

<body class="nk-body bg-white npc-general pg-auth">
<!-- app body @s -->
<div class="nk-app-root">

    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="/" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="/images/logo.png"
                                 srcset="/images/logo.png 2x" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="/images/logo.png"
                                 srcset="/images/logo.png 2x" alt="logo-dark">
                        </a>
                        <br/>
                        <br/>
                        <h2 class="text-danger">{{ config('app.name', 'GovMail') }} </h2>
                        <h4>EReg SMS Portal</h4>
                    </div>
                    <div class="card card-bordered shadow">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content  text-center">
                                    <h4 class="nk-block-title">Sign-In</h4>
                                    <div class="nk-block-des">
                                        <p>Access the {{ config('app.name', 'GovMail') }} panel using your email and
                                            passcode.</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                @if (session('message'))
                                    <div class="alert alert-danger">{{ session('message') }}</div>
                                @endif
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email or Username</label>
                                    </div>
                                    <input type="text"
                                           class="form-control form-control-lg {{ $errors->has('username') ? 'border-danger' : '' }}"
                                           id="default-01" placeholder="Enter your email address or username" name="username"
                                           value="{{ old('username') }}" required>
                                    @if($errors->has('username'))
                                        <label id="username-error" class="validation-invalid-label"
                                               for="username">{{$errors->first('username')}}</label>
                                    @endif
                                </div><!-- .foem-group -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Password</label>
                                        <a class="link link-danger link-sm" tabindex="-1" href="{{ route('password.request') }}">Forgot
                                            Code?</a>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                                           data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password"
                                               class="form-control form-control-lg {{ $errors->has('password') ? 'border-danger' : '' }}"
                                               id="password"
                                               placeholder="Enter your passcode">
                                    </div>
                                </div><!-- .foem-group -->
                                <div class="form-group">
                                    <button class="btn btn-lg btn-danger btn-block">Sign in</button>
                                </div>
                            </form>

{{--                                <div class="form-note-s2 text-center pt-4"> New on our platform? <a--}}
{{--                                        href="/register">Create an account</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center pt-4 pb-3">--}}
{{--                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>--}}
{{--                                </div>--}}
{{--                                <ul class="nav justify-center gx-4">--}}
{{--                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>--}}
{{--                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>--}}
{{--                                </ul>--}}
                        </div>
                    </div>
                </div>
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6 order-lg-last">
                                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="#">Terms & Condition</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="#">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="#">Help</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-left text-danger">
                                    <p>&copy; {{date('Y')}}. {{ config('app.name', 'GovMail') }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->

</div><!-- app body @e -->
<!-- JavaScript -->
<script src="/templates/d-main/assets/js/bundle.js?ver=1.9.2"></script>
<script src="/templates/d-main/assets/js/scripts.js?ver=1.9.2"></script>
</body>

</html>
