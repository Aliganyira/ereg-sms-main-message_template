@extends('ui::templates.limitless.layouts.layout_2')
@section('before_app_js')
    <script src="/templates/l/global_assets/js/plugins/pickers/anytime.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script src="/templates/l/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script src="/templates/l/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script src="/templates/l/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>

    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
@endsection
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/picker_date.js"></script>
    <script src="/templates/l/global_assets/js/demo_pages/components_popups.js"></script>
    <script src="/templates/l/global_assets/js/demo_pages/datatables_extension_buttons_html5.js"></script>
    <script src="/templates/l/global_assets/js/demo_pages/table_elements.js"></script>
    <script src="/js/custom.js"></script>
@endsection
@section('bottom')
    <script src="/js/multiple_select.js"></script>
@endsection
@section('content-wrapper')

    <!-- Content area -->
    <div class="content p-0">

        <!-- Basic table -->
        <div class="card shadow-none rounded-0">

            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{humanize(Request::segment(2))}} {{humanize(Request::segment(3))}}

                </h5>
                <div class="header-elements">

                    <div class="list-icons">
                        <a class="list-icons-item badge badge-primary text-white" href="{{route(Request::segment(2).'.create')}}"><i class="icon-pen"></i> New</a>

                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>


            <div class="card-body  table-responsive">
                <form action="#" method="post" autocomplete="off">
                    @csrf
                    <table class="table table-hover table-bordered sms-ajax">
                        <thead>

                        <tr>
                            <td colspan="4">

                                <div class="form-group row mb-0">
                                    <div class="col-5">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22">From</i></span>
                                            </span>
                                            <input type="text" class="form-control pickadate-selectors"
                                                   placeholder="yyyy-mm-dd"
                                                   value="{{old('from_submit')}}"
                                                   name="from">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22">To</i></span>
                                            </span>
                                            <input type="text" class="form-control pickadate-selectors" placeholder="yyyy-mm-dd" value="{{old('to_submit')}}" name="to">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" name="action" value="filter-sms" class="btn btn-outline-success">
                                            <i class="icon-equalizer2 position-left">Filter</i>
                                        </button>
                                    </div>
                                </div>


                            </td>

                        </tr>


                        <tr class="table-active">


                            <th style="width: 8px;"><input type="checkbox" class="form-input-style selectall" data-fou>
                            </th>

                            <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('created_at')}}</th>
                            <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('msisdn')}}</th>
                            <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('subject')}}</th>
                            <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('message')}}</th>
                            <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('status')}}</th>
                            <th style="width: 8px;"><i class="icon-menu9"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </form>


            </div>

        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->


    <!-- Footer -->

    <!-- /footer -->


@endsection
