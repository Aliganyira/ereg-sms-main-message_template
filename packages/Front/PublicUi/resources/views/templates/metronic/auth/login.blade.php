<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="">
    <title>{{ config('app.name', 'MabunuEvents') }}</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="templates/m/assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="templates/m/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="templates/m/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-dark">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(templates/m/assets/media/illustrations/sketchy-1/14-dark.png">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="/" class="mb-12">
                <img alt="Logo" src="templates/m/assets/media/logos/logo-2.svg" class="h-40px" />
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="post">
                @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Sign In to {{ config('app.name', 'MabunuEvents') }}</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">New Here?
                            <a href="{{route('register')}}" class="link-primary fw-bolder">Create an Account</a></div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->

                    @if (session('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                @section('messages')
                    @include('PublicUi::templates.metronic.alerts.messages')
                @show


                <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid {{ $errors->has('username') ? 'border-danger' : '' }}" type="text" name="username" autocomplete="off" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <!--end::Label-->
                            <!--begin::Link-->
                            <a href="../../demo1/dist/authentication/flows/dark/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid  {{ $errors->has('password') ? 'border-danger' : '' }}" type="password" name="password" autocomplete="off" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">Continue<i class="icon-circle-right2 ml-2"></i></button>
                        <button hidden type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Continue</span>
                            <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->

                        <!--begin::Separator-->
                        <div hidden class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                        <!--end::Separator-->
                        <!--begin::Google link-->
                        <a hidden href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt="Logo" src="templates/m/assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
                        <!--end::Google link-->
                        <!--begin::Google link-->
                        <a hidden href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt="Logo" src="templates/m/assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a>
                        <!--end::Google link-->
                        <!--begin::Google link-->
                        <a hidden href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
                            <img alt="Logo" src="templates/m/assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a>
                        <!--end::Google link-->

                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="#" class="text-muted text-hover-primary px-2">About</a>
                <a href="mailto:#" class="text-muted text-hover-primary px-2">Contact</a>
                <a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Main-->
<script>var hostUrl = "templates/m/assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="templates/m/assets/plugins/global/plugins.bundle.js"></script>
<script src="templates/m/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="templates/m/assets/js/custom/authentication/sign-in/general.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
