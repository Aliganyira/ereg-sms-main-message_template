@extends('ui::templates.limitless.layouts.layout_2')

@section('before_app_js')
    <script src="/templates/l/global_assets/js/plugins/extensions/rowlink.js"></script>
    <script src="/templates/l/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/core/main.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js"></script>
    <script src="/templates/l/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js"></script>
@endsection
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/user_pages_profile_tabbed.js"></script>
@endsection
@section('content-wrapper')

    <div class="content border-0">
        <!-- Inner container -->
        <div class="d-md-flex align-items-md-start">


            <!-- Left sidebar component -->
            <div
                class="sidebar sidebar-light bg-white sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- Navigation -->
                    <div class="card">
                        <?php $e_signature = $user->e_signature;
                        $signature = isset($e_signature) ? $e_signature->signature : '/templates/l/global_assets/images/backgrounds/panel_bg.png'; ?>
                        <div class="card-body bg-indigo-400 text-center card-img-top"
                             style="background-image: url({{$signature}}); background-size: contain;">
                            <div class="card-img-actions d-inline-block mb-3">
                                <?php $photo = $user->photo;
                                $img_src = isset($photo) ? $photo->photo : '/templates/l/global_assets/images/placeholders/placeholder.jpg'; ?>
                                <img class="img-fluid rounded-circle"
                                     src="{{$img_src}}" width="170"
                                     height="170" alt="">
                                <div class="card-img-actions-overlay rounded-circle">
                                    <a href="#"
                                       class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                        <i class="icon-plus3"></i>
                                    </a>
                                    <a href="user_pages_profile.html"
                                       class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                        <i class="icon-link"></i>
                                    </a>
                                </div>
                            </div>

                            <h6 class="font-weight-semibold mb-0">{{$user->first_name.' '.$user->last_name}}</h6>
                            <span class="d-block opacity-75">{{$user->email}}</span>

                            <div class="list-icons list-icons-extended mt-3">
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title=""
                                   data-container="body" data-original-title="Google Drive"><i
                                        class="icon-google-drive"></i></a>
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title=""
                                   data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a>
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title=""
                                   data-container="body" data-original-title="Github"><i class="icon-github"></i></a>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <ul class="nav nav-sidebar mb-2">
                                <li class="nav-item">
                                    <a href="#profile" class="nav-link active" data-toggle="tab">
                                        <i class="icon-user"></i>
                                        My profile
                                    </a>
                                </li>
                                <li hidden class="nav-item">
                                    <a href="#schedule" class="nav-link" data-toggle="tab">
                                        <i class="icon-calendar3"></i>
                                        Schedule
                                        <span class="font-size-sm font-weight-normal opacity-75 ml-auto">02:56pm</span>
                                    </a>
                                </li>
                                <li hidden class="nav-item">
                                    <a href="#inbox" class="nav-link" data-toggle="tab">
                                        <i class="icon-envelop2"></i>
                                        Inbox
                                        <span class="badge bg-danger badge-pill ml-auto">29</span>
                                    </a>
                                </li>
                                <li hidden class="nav-item">
                                    <a href="#orders" class="nav-link" data-toggle="tab">
                                        <i class="icon-cart2"></i>
                                        Tenders
                                        <span class="badge bg-success badge-pill ml-auto">16</span>
                                    </a>
                                </li>

                                <li hidden class="nav-item">
                                    <a href="#settings" class="nav-link" data-toggle="tab">
                                        <i class="icon-cogs"></i>
                                        Settings
                                        {{--<span class="badge bg-success badge-pill ml-auto">06</span>--}}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- /navigation -->

                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /left sidebar component -->


            <!-- Right content -->
            <div class="tab-content w-100 overflow-hidden">

                <div class="tab-pane fade active show" id="profile">
                    @include('user-management::limitless.view.tabs.profile')
                </div>

                <div class="tab-pane fade" id="schedule">
                    @include('user-management::limitless.view.tabs.schedule')

                </div>

                <div class="tab-pane fade" id="inbox">
                    @include('user-management::limitless.view.tabs.inbox')
                </div>

                <div class="tab-pane fade" id="orders">
                    @include('user-management::limitless.view.tabs.orders')
                </div>

                <div class="tab-pane" id="settings">
                    @include('user-management::limitless.view.tabs.settings')
                </div>
            </div>
            <!-- /right content -->

        </div>
        <!-- /inner container -->
    </div>

@endsection
