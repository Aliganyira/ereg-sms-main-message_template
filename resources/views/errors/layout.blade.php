

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') {{ config('app.name','GovMail') }}</title>

    <!-- Global stylesheets -->
{{--    /templates/l/global_assets/css/icons/icomoon/styles.min.css--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/templates/l/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-2/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-2/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-2/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-2/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/layout-2/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="/templates/l/global_assets/js/main/jquery.min.js"></script>
    <script src="/templates/l/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/templates/l/layout-2/assets/js/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="/" class="d-inline-block">
            <img src="/images/egp_logo.png" alt="">
        </a>
    </div>


</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Container -->
            <div class="flex-fill">

                <!-- Error title -->
                <div class="text-center mb-3">
                    <h1 class="error-title"> @yield('code', __('Oh no'))</h1>
                    <h5> @yield('message')</h5>
                </div>
                <!-- /error title -->


                <!-- Error content -->
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">

                        <!-- Search -->
                        <form action="#">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn bg-slate-600 btn-icon btn-lg"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </form>
                        <!-- /search -->


                        <!-- Buttons -->
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ app('router')->has('home') ? route('home') : url('/') }}" class="btn btn-primary btn-block"><i class="icon-home4 mr-2"></i> {{ __('Go Home') }}</a>
                            </div>

                            <div class="col-sm-6">
                                <a href="#" class="btn btn-light btn-block mt-3 mt-sm-0"><i class="icon-menu7 mr-2"></i> Advanced search</a>
                            </div>
                        </div>
                        <!-- /buttons -->

                    </div>
                </div>
                <!-- /error wrapper -->

            </div>
            <!-- /container -->

        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; {{ date('Y') }}. <a href="#">{{ config('app.name','GovMail') }}</a>
					</span>

{{--                <ul class="navbar-nav ml-lg-auto">--}}
{{--                    <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>--}}
{{--                    <li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>--}}
{{--                    <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>--}}
{{--                </ul>--}}
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
