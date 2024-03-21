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

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/templates/l/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/templates/l/assets/css/colors.min.css" rel="stylesheet" type="text/css">
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

    <script src="assets/js/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>


<!-- Page content -->
<div id="app" class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex p-0 ">

            <div class="row">
                <div class="col d-flex justify-content-center align-items-center bg-dark" style="min-width: 380px;max-width: 450px;">

                    <!-- Registration form -->
                    <form class="login-form" action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="card mb-0 bg-transparent">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-plus3 icon-2x text-success p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Create account</h5>
                                    <span class="d-block text-muted">All fields are required</span>
                                </div>


                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2 bg-dark">Your credentials</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control @error('name') border-danger border-2 @enderror"
                                           placeholder="Full name">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                    @error('name')
                                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text"
                                           name="email"
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') border-danger border-2 @enderror"
                                           placeholder="Your email">
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-danger {{ $errors->has('email') ? 'text-danger' : 'text-muted' }}"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="email"
                                           name="email_confirmation"
                                           value="{{ old('email_confirmation') }}"
                                           class="form-control @error('email') border-danger border-2 @enderror"
                                           placeholder="Repeat email">
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-danger {{ $errors->has('email') ? 'text-danger' : 'text-muted' }}"></i>
                                    </div>
                                    @error('email')
                                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" name="password" class="form-control @error('password') border-danger border-2 @enderror" placeholder="Password">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i> {{ $message }}</span>
                                @enderror

                                <button type="submit" class="btn bg-teal-400 btn-block mt-3 mb-3">Register <i class="icon-circle-right2 ml-2"></i></button>

                                <div class="form-group">
                                    By signing up, I agree to the <a href="#">Terms of Service</a>
                                </div>

                                <div class="form-group text-center text-muted content-divider">
                                    <span class="px-2 bg-dark">More actions</span>
                                </div>

                                <div class="form-group mt-4">
                                    <a href="/" class="btn btn-dark btn-block border-light">Already have an account Sign in</a>
                                </div>

                                <div class="form-group d-none">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
                                            Send me <a href="#">test account settings</a>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
                                            Subscribe to monthly newsletter
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-input-styled" data-fouc>
                                            Accept <a href="#">terms of service</a>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- /registration form -->

                </div>
                <div class="col-auto d-flex justify-content-center align-items-center" style="min-width: 960px;max-width: 1280px">

                    <div class="d-block">
                        <div class="row">
                            <div class="d-block" style="font-size: 300%">Electronic Government Procurement</div>
                        </div>
                        <div class="row">
                            <div class="d-block font-weight-bolder" style="font-size: 900%">EGP Uganda</div>
                        </div>
                        <div class="row">
                            <div class="d-block font-weight-bold" style="font-size: 150%">Registration, Planning, Initiation, Bid Process, Evaluation ...</div>
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

<script>

    var LoginRegistration = function () {


        //
        // Setup module components
        //

        // Uniform
        var _componentUniform = function() {
            if (!$().uniform) {
                console.warn('Warning - uniform.min.js is not loaded.');
                return;
            }

            // Initialize
            $('.form-input-styled').uniform();
        };


        //
        // Return objects assigned to module
        //

        return {
            initComponents: function() {
                _componentUniform();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        LoginRegistration.initComponents();
    });

</script>

</body>
</html>
