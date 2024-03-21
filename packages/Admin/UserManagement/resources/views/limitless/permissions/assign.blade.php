@extends('ui::templates.limitless.layouts.layout_2')
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/form_select2.js"></script>
@endsection
@section('content-wrapper')

        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4>
                        <i class="icon-files-empty2 mr-2"></i>
                        <span class="font-weight-semibold">Permissions Assign</span>
                    </h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <span class="breadcrumb-item">Settings</span>
                        <span class="breadcrumb-item">Permissions</span>
                        <span class="breadcrumb-item active">Assign</span>
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements">
                    <div class="breadcrumb justify-content-center">
                        <a href="{{route('permissions.index')}}" class=" btn btn-danger btn-sm rounded-round font-weight-bold">
                            <i class="icon-plus-circle2 mr-1"></i>
                            Permissions
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content border-0">

            @include('ui::templates.limitless.messages')

            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    @if ($selectPermissions)
                        <li class="nav-item"><a href="{{route('permissions.assign')}}" class="nav-link">Select User</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active font-weight-bold">Assign Permission(s)</a></li>
                    @else
                        <li class="nav-item"><a href="{{route('permissions.assign')}}" class="nav-link active font-weight-bold">Select User</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Assign Permission(s)</a></li>
                    @endif
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade @if (!$selectPermissions) show active @endif" id="bottom-tab1">

                        <form action="{{route('permissions.assign-on-select-user')}}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <select name="user_id" class="form-control select" data-fouc>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}} #{{$user->id}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-danger font-weight-bold">
                                        <i class="icon-chevron-right mr-1"></i> Continue
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="tab-pane fade @if ($selectPermissions) show active @endif" id="bottom-tab2">

                        @if ($selectPermissions)

                            <form action="{{route('permissions.store')}}" method="post" autocomplete="off">
                                @csrf

                                <input type="hidden" name="user_id" value="{{$user->id}}">


                                @foreach($permissions as $permission => $actions)
                                    <div class="form-group row">

                                        <label class="col-lg-3 col-form-label">
                                            {{$permission}}
                                        </label>
                                        <div class="col-lg-9">

                                            @foreach($actions as $key => $action)
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox"
                                                           name="permissions[]"
                                                           class="custom-control-input"
                                                           id="{{$key}}"
                                                           @if($user->can($permission.'.'.$action)) checked @endif
                                                           value="{{$key}}">
                                                    <label class="custom-control-label" for="{{$key}}">{{$action}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group row">
                                    <div class="col-lg-10">
                                        <a href="{{route('permissions.assign')}}" class="btn btn-primary font-weight-bold">
                                            <i class="icon-chevron-left mr-1"></i> Select User
                                        </a>

                                        <button type="submit" class="btn btn-danger font-weight-bold">
                                            <i class="icon-user-lock mr-1"></i> Assign Permission(s) to User
                                        </button>
                                    </div>
                                </div>

                            </form>

                        @endif

                    </div>

                </div>
            </div>



        </div>
        <!-- /content area -->


        <!-- Footer -->

        <!-- /footer -->

@endsection
