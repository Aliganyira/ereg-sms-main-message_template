@extends('ui::templates.limitless.layouts.layout_2')
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/components_popups.js"></script>
@endsection
@section('content-wrapper')

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-files-empty2 mr-2"></i>
                    <span class="font-weight-semibold">Roles</span>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Roles</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements">
                <div class="breadcrumb justify-content-center">
                    <a href="{{route('roles.index')}}" class=" btn btn-danger btn-sm font-weight-bold mr-2">
                        <i class="icon-users mr-1"></i>
                        Role(s)
                    </a>
                    <a href="{{route('roles.assign')}}" class=" btn btn-danger btn-sm font-weight-bold mr-2">
                        <i class="icon-users4 mr-1"></i>
                        Assign Role(s)
                    </a>
                    <a href="{{route('roles.create')}}" class=" btn btn-danger btn-sm font-weight-bold">
                        <i class="icon-plus-circle2 mr-1"></i>
                        Create Role
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content border-0 p-0">

        <!-- Basic table -->
        <div class="card shadow-none rounded-0 border-0">

            <div class="">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>
                                <h3>{{$role->name}}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td nowrap="">Gard name</td>
                            <td>{{$role->guard_name}}</td>
                        </tr>
                        <tr>
                            <td class="align-top">Permissions</td>
                            <td style="text-wrap: normal !important;">

                                <div class="row">
                                @foreach($permissions as $permission => $actions)

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="card card-body border-0 shadow-0 p-0">

                                            <div class="dropdown-menu border-0 shadow-0" style="display: block; position: static; width: 100%; margin-top: 0; float: none; z-index: auto;">
                                                <div class="dropdown-header font-weight-semibold">{{$permission}}</div>

                                                @foreach($actions as $action)
                                                <a href="#" class="dropdown-item">
                                                    <i class="icon-primitive-dot @if($role->hasPermissionTo($permission.'.'.$action)) icon-rg-has-permission-to text-success-600 @else text-warning-300 @endif"></i> {{$action}}
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>

        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->

    <style>
        .icon-rg-has-permission-to {
            margin-left: -8px !important;
            font-size: 2rem;
        }
    </style>


    <!-- Footer -->

    <!-- /footer -->

@endsection
