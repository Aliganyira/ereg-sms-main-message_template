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
                <form action="{{route(Request::segment(2).'.assign-moderators')}}" method="post" autocomplete="off">
                    @csrf
                    <table class="table  datatable-button-html5-basic-pdf-legal-checkbox table-hover table-bordered">
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


                            <td colspan="3">

                                <div class="form-group row mb-0">
                                    <label class="col-1 col-form-label" style="white-space: nowrap" nowrap="">Moderator:</label>
                                    <div class="col-3">
                                        <select name="moderator" class="form-control form-control-select2 "
                                                data-placeholder="Select Moderator" data-fouc>
                                            <option value="{{old('moderator')}}"> Select Moderator</option>
                                            @foreach($moderators as $m)
                                                <option value="{{$m->id}}" {{(isset($record->moderated_by)?$record->moderated_by:old('moderator'))==$m->id?'selected':''}}>
                                                    {{optional($m)->first_name}} {{optional($m)->last_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <button type="submit" name="action" value="sms" class="btn btn-outline-success">
                                            <i class="icon-floppy-disk position-left">Assign</i>
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
                        @php $no=1; @endphp
                        @foreach($records as $r)

                            <tr>

                                <td>
                                    <input type="checkbox" value="{{$r->msisdn}}" name="id[]" class="form-input-style " data-fou>
                                </td>

                                <td nowrap="">{{$r->created_at}}</td>
                                <td nowrap="">{{$r->msisdn}}</td>
                                <td nowrap="">{{$r->subject}}</td>
                                <td nowrap="" title="{{$r->message}}">{{ \Illuminate\Support\Str::limit($r->message,50)}}</td>
                                <td>
                                    @php $status=status($r->moderation_status); @endphp
                                    <div class="badge {{@$status->alert}}">{{@$status->name}}</div>
                                </td>

                                <td>
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{route(Request::segment(2).'.show',$r->msisdn)}}" class="dropdown-item"><i class="icon-eye2"></i> View all related Messages</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
