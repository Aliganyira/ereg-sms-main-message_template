@extends('ui::templates.limitless.layouts.layout_2')
@section('head')

    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/core/main.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js"></script>

    <script src="/templates/l/global_assets/js/demo_pages/fullcalendar_styling.js"></script>

@endsection

@section('content-wrapper')

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Fullcalendar</span> - Styling</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                    <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                    <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="fullcalendar_styling.html" class="breadcrumb-item">Fullcalendar</a>
                    <span class="breadcrumb-item active">Styling</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <a href="#" class="breadcrumb-elements-item">
                        <i class="icon-comment-discussion mr-2"></i>
                        Support
                    </a>

                    <div class="breadcrumb-elements-item dropdown p-0">
                        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear mr-2"></i>
                            Settings
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                            <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                            <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Event colors -->
        <div class="card border-0 shadow-0">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Calender for financial year ending {{(date('Y')+1)}}</h5>
            </div>

            <div class="card-body">
                <div class="fullcalendar-event-colors"></div>
            </div>
        </div>
        <!-- /event colors -->


    </div>
    <!-- /content area -->

@endsection
