@extends('ui::templates.limitless.layouts.layout_2')
@section('content-wrapper')

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-files-empty2 mr-2"></i>
                    <span class="font-weight-semibold">Create Roles</span>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item">Settings</span>
                    <span class="breadcrumb-item">Roles</span>
                    <span class="breadcrumb-item active">Create</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements">
                <div class="breadcrumb justify-content-center">
                    <a href="{{route('roles.index')}}" class=" btn btn-danger btn-sm rounded-round font-weight-bold">
                        <i class="icon-plus-circle2 mr-1"></i>
                        Roles
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content border-0">

        <form action="{{route('roles.store')}}" method="post" autocomplete="off">
            @csrf


            <div class="card p-0 shadow-none border-0">
                <div class="card-body p-0">

                    <div class="form-group row">

                        <label class="col-lg-3 col-form-label">Role name</label>
                        <div class="col-lg-4">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Role Name">
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-lg-3 col-form-label">All Permissions</label>
                        <div class="col-lg-9">

                            <div class="custom-control custom-checkbox custom-control-inline pr-3">
                                <input type="checkbox"
                                       value="customer"
                                       class="custom-control-input"
                                       @click="selectAllPermissions($event)"
                                       id="select-all-permissions">
                                <label class="custom-control-label font-weight-bold" for="select-all-permissions">All Permissions</label>
                            </div>

                        </div>
                    </div>

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
                                       value="{{$key}}">
                                <label class="custom-control-label" for="{{$key}}">{{$action}}</label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @endforeach

                    <div class="form-group row">
                        <div class="col-lg-9 offset-3">
                            <button type="submit" class="btn btn-danger font-weight-bold">
                                <i class="icon-user-lock mr-1"></i> Create Roles
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </form>

    </div>
    <!-- /content area -->

@endsection
