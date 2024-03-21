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
                        {{--                        <a class="list-icons-item badge badge-primary text-white" href="{{route(Request::segment(2).'.create')}}"><i class="icon-pen"></i> New</a>--}}
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>


            <div class="card-body">


                <!-- Single line -->
                <div class="card">
                    <div hidden class="card-header bg-transparent header-elements-inline">
                        <h6 class="card-title">My Inbox (single line)</h6>

                        <div hidden class="header-elements">
                            <span class="badge bg-blue">259 new today</span>
                        </div>
                    </div>

                    <!-- Action toolbar -->
                    <div hidden class="navbar navbar-light bg-light navbar-expand-lg border-bottom-0 py-lg-2">
                        <div class="text-center d-lg-none w-100">
                            <button type="button" class="navbar-toggler w-100" data-toggle="collapse"
                                    data-target="#inbox-toolbar-toggle-single">
                                <i class="icon-circle-down2"></i>
                            </button>
                        </div>

                        <div class="navbar-collapse text-center text-lg-left flex-wrap collapse"
                             id="inbox-toolbar-toggle-single">
                            <div class="mt-3 mt-lg-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light btn-icon btn-checkbox-all">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </button>

                                    <button type="button" class="btn btn-light btn-icon dropdown-toggle"
                                            data-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">Select all</a>
                                        <a href="#" class="dropdown-item">Select read</a>
                                        <a href="#" class="dropdown-item">Select unread</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Clear selection</a>
                                    </div>
                                </div>

                                <div class="btn-group ml-3 mr-lg-3">
                                    <button type="button" class="btn btn-light"><i class="icon-pencil7"></i> <span
                                            class="d-none d-lg-inline-block ml-2">Compose</span></button>
                                    <button type="button" class="btn btn-light"><i class="icon-bin"></i> <span
                                            class="d-none d-lg-inline-block ml-2">Delete</span></button>
                                    <button type="button" class="btn btn-light"><i class="icon-spam"></i> <span
                                            class="d-none d-lg-inline-block ml-2">Spam</span></button>
                                </div>
                            </div>

                            <div class="navbar-text ml-lg-auto"><span class="font-weight-semibold">1-50</span> of <span
                                    class="font-weight-semibold">528</span></div>

                            <div class="ml-lg-3 mb-3 mb-lg-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light btn-icon disabled"><i
                                            class="icon-arrow-left12"></i></button>
                                    <button type="button" class="btn btn-light btn-icon"><i
                                            class="icon-arrow-right13"></i></button>
                                </div>

                                <div class="btn-group ml-3">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-cog3"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                        <a href="#" class="dropdown-item">One more line</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /action toolbar -->


                    <!-- Table -->
                    <div class="table-responsive">


                        <table class="table table-inbox">
                            <thead>
                            <tr>
                                <th>UID</th>
                                <th>Subject</th>
                                <th>From</th>
                                <th>Body</th>
                                <th>Attachments</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($messages->count() > 0)
                                @foreach($messages as $oMessage)
                                    <tr>
                                        <td style="width: 8px;"><a href="{{route('messages.inbox-email-view',$oMessage->getUid())}}">{{$oMessage->getUid()}}</a></td>
                                        <td><a href="{{route('messages.inbox-email-view',$oMessage->getUid())}}">{{$oMessage->getSubject()}}</a></td>
                                        <td>{{$oMessage->getFrom()[0]->mail}}</td>
                                        <td> {{$oMessage->getTextBody()}}  </td>
                                        <td>{{$oMessage->getAttachments()->count() > 0 ? 'yes' : 'no'}}</td>
                                        <td>

                                            <?php print_r($oMessage->getDate()[0]->toDateTimeString()) ?>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">No messages found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        {{$messages->links('vendor.pagination.bootstrap-4')}}

                    </div>
                    <!-- /table -->

                </div>
                <!-- /single line -->


            </div>

        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->


    <!-- Footer -->

    <!-- /footer -->

@endsection
