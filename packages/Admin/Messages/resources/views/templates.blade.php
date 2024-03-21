@extends('ui::templates.limitless.layouts.layout_2')
@section('before_app_js')
    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
@endsection
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/components_popups.js"></script>
    <script src="/templates/l/global_assets/js/demo_pages/datatables_extension_buttons_html5.js"></script>
@endsection
@section('content-wrapper')


    <!-- Content area -->
    <div class="content p-0">

        <!-- Basic table -->
        <div class="card shadow-none rounded-0">

            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{humanize(Request::segment(2))}} {{humanize(Request::segment(3))}}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item badge badge-primary text-white" href="{{route(Request::segment(2).'.create')}}"><i class="icon-pen"></i> Add Template</a>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>


            <div class="card-body  table-responsive">
                <table class="table  datatable-button-html5-basic-pdf-legal table-hover table-bordered">
                    <thead>
                    <tr class="table-active">
                        <th style="width: 2px;">#</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('Id')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('Type')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('created_at')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('recipient')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('subject')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('message')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('status')}}</th>
                       
                        <th style="width: 8px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($records as $r)
                        <tr>
                            <td>{{$no++}}</td>
                            <td nowrap="">{{$r->created_at}}</td>
                            <td nowrap="">{{$r->to_user}}</td>
                            <td>{{$r->subject}}</td>
                            <td>{{$r->message}}</td>
                            <td>{{$r->status}}</td>
                            <td>{{$r->message_id}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm text-nowrap"
                                   href="#">
                                    <i class="icon-eye2"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>

        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->


    <!-- Footer -->

    <!-- /footer -->

@endsection
