<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'HPV') }}::{{humanize(Request::segment(2))}} {{humanize(Request::segment(3))}}</title>

    <!-- Global stylesheets -->
    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,500,700,900&display=swap"
          rel="stylesheet">
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
    <script src="/templates/l/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/pickers/daterangepicker.js"></script>

    <script src="/templates/l/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/selects/select2.min.js"></script>

    <script src="/templates/l/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    @yield('before_app_js')

    <script src="/templates/l/layout-2/assets/js/app.js"></script>
    <!-- /theme JS files -->
    <script src="/templates/l/global_assets/js/demo_pages/form_select2.js"></script>
    <script src="/templates/l/global_assets/js/demo_pages/datatables_basic.js"></script>

    @yield('head')

</head>

<body class="bg-white">
<form id="form-logout" ref="form-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- Main navbar -->
@include('ui::templates.limitless.layouts.layout_2-main-top-navbar')
<!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
    @include('ui::templates.limitless.layouts.layout_2-main-sidebar')
    <!-- /main sidebar -->
        <!-- Main content -->


        <div class="content-wrapper">

        @php
            $user = Auth::user();
            $segmentOne = Request::segment(1);
            $segmentTwo = Request::segment(2);
            $segmentThree = Request::segment(3);
            $segmentFour = Request::segment(4);
        @endphp


        <!-- Page header -->
            <div  {{$segmentOne=='home'||$segmentOne=='dashboard'?'hidden':''}} class="page-header page-header-light">
                <div hidden class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4>
                            <i class="icon-files-empty2 mr-2"></i>
                            <span class="font-weight-semibold">
                            @if(empty($segmentTwo))
                                    {{humanize($segmentOne)}}
                                    @php
                                        $action='create';
                                    @endphp
                                @else
                                    {{humanize($segmentTwo)}} {{humanize(\Illuminate\Support\Str::singular($segmentOne))}}
                                    @php
                                        $action='';
                                    @endphp
                                @endif
                        </span>
                        </h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline d-print-none">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="#" class="breadcrumb-item">{{humanize($segmentOne)}}</a>
                            <span class="breadcrumb-item active">{{humanize($segmentTwo)}}</span>
                            <span {{empty($segmentThree)|| (int)$segmentThree!=0?'hidden':''}} class="breadcrumb-item active">{{humanize($segmentThree)}}</span>
                            <span  {{empty($segmentFour)|| (int)$segmentFour!=0?'hidden':''}}  class="breadcrumb-item active">{{humanize($segmentFour)}}</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    {{--                <div class="header-elements hidden">--}}
                    {{--                    <div class="breadcrumb justify-content-center">--}}
                    {{--                        <a href="/{{$segmentOne}}/{{$action}}" class=" btn btn-primary btn-sm font-weight-bold">--}}
                    {{--                            <i class="icon-plus-circle2 mr-1"></i>--}}
                    {{--                            {{humanize($action)}} {{humanize($segmentOne)}}--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </div>
            <!-- /page header -->


            <!--Message Alert -->
        @section('messages')
            @include('ui::templates.limitless.messages')
        @show
        <!--Message Alert -->
            @yield('content-wrapper')
            @include('ui::templates.limitless.layouts.footer')

        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->

@yield('bottom')

@yield('js_scripts')

</body>
</html>
@yield('script')

