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
                    <span class="font-weight-semibold">Assign Roles</span>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item">Roles</span>
                    <span class="breadcrumb-item active">Assign</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements">
                <div class="breadcrumb justify-content-center">
                    <a href="{{route('roles.index')}}" class=" btn btn-danger btn-sm font-weight-bold">
                        <i class="icon-list-numbered mr-1"></i>
                        Roles
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content border-0">

            <div class="card border-0 p-0 shadow-0">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Assign Roles to User</h6>
                </div>

                @include('ui::templates.limitless.messages')

                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        @if ($selectRoles)
                            <li class="nav-item"><a href="admin/roles/assign" class="nav-link">Select User</a></li>
                            <li class="nav-item"><a href="#bottom-tab2" class="nav-link active font-weight-bold">Assign Roles</a></li>
                        @else
                            <li class="nav-item"><a href="admin/roles/assign" class="nav-link active font-weight-bold">Select User</a></li>
                            <li class="nav-item"><a href="#bottom-tab2" class="nav-link">Assign Roles</a></li>
                        @endif
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade @if (!$selectRoles) show active @endif" id="bottom-tab1">

                            <form action="admin/roles/assign-on-select-user" method="post" autocomplete="off">
                                @csrf

                                <div class="form-group">
                                    <select name="user_id" class="form-control select" data-fouc>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
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

                        <div class="tab-pane fade @if ($selectRoles) show active @endif" id="bottom-tab2">

                            @if ($selectRoles)

                                <form action="admin/roles/assign-store" method="post" autocomplete="off">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{$user->id}}">

                                    {{--
                                    <div class="form-group row">

                                        <div class="col-lg-9">

                                            <div class="custom-control custom-checkbox custom-control-inline pr-3">
                                                <input type="checkbox"
                                                       value="customer"
                                                       class="custom-control-input"
                                                       @click="selectAllRoles($event)"
                                                       id="select-all-permissions">
                                                <label class="custom-control-label font-weight-bold" for="select-all-permissions">All Roles</label>
                                            </div>

                                        </div>
                                    </div>
                                    --}}

                                    @foreach($roles as $role)
                                        <div class="form-group row">

                                            <div class="col-lg-12 ml-3">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox"
                                                           name="role_ids[]"
                                                           class="custom-control-input"
                                                           id="{{$role->name}}"
                                                           value="{{$role->name}}"
                                                           @if($user->hasRole($role->name)) checked @endif>
                                                    <label class="custom-control-label" for="{{$role->name}}">{{$role->name}}</label>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="form-group row">
                                        <div class="col-lg-10">
                                            <a href="admin/roles/assign" class="btn btn-primary font-weight-bold">
                                                <i class="icon-chevron-left mr-1"></i> Select User
                                            </a>

                                            <button type="submit" class="btn btn-danger font-weight-bold">
                                                <i class="icon-user-lock mr-1"></i> Assign Role(s) to User
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            @endif

                        </div>

                    </div>
                </div>
            </div>


    </div>
    <!-- /content area -->

@endsection
