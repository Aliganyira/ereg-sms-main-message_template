@extends('ui::templates.limitless.layouts.layout_2')
@section('before_app_js')
    <!-- Theme JS files -->
{{--    <script src="/templates/l/global_assets/js/plugins/visualization/d3/d3.min.js"></script>--}}
{{--    <script src="/templates/l/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>--}}

@endsection
@section('head')
    <script src="/highcharts/code/highcharts.js"></script>
    <script src="/highcharts/code/modules/highcharts-more.js"></script>
    <script src="/highcharts/code/modules/exporting.js"></script>
    <script src="/highcharts/code/modules/export-data.js"></script>
    <script src="/highcharts/code/modules/accessibility.js"></script>



    <script src="/highcharts/code/highcharts-3d.js"></script>
    <script src="/highcharts/code/modules/cylinder.js"></script>
    <script src="/highcharts/code/modules/drilldown.js"></script>
    <script src="/highcharts/code/modules/treemap.js"></script>

    <script>
        Highcharts.setOptions({
            colors: ['#FF9655',  '#741AAC','#340744', '#FFF263', '#6AF9C4','#058DC7','#DEBAD6', '#50B432']
        });
    </script>

@endsection
@section('content-wrapper')

    <!-- Page header -->
    <div  class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                <div class="btn-group">
                    <button type="button" class="btn bg-indigo-400"><i class="icon-stack2 mr-2"></i> New Summary report</button>
                    <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">Summary Report</div>
                        <a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View reports</a>
                        <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit reports</a>
                        <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>
                        <div class="dropdown-header">Summary Report Export</div>
                        <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
                        <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div  class="content pt-0">

{{--        <div class="alert alert-styled-left alert-info">Dashboard Coming Soon !!!</div>--}}

        @include('Dashboard::template.boxes')
        @include('Dashboard::template.chart2')
        @include('Dashboard::template.pie_chart')

    </div>
    <!-- /content area -->

@endsection
