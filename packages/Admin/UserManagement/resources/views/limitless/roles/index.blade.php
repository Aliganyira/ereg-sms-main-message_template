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
                <table class="table table-hover">
                    <tbody>
                    <tr class="table-active">
                        <th class="font-weight-bold text-uppercase" nowrap="">Role</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">Gard Name</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">Permissions</th>
                    </tr>

                    @foreach($roles as $role)
                    <tr>
                        <td>
                            <a href="{{route('roles.show',$role->id)}}" class="font-weight-semibold">{{$role->name}}</a>
                        </td>
                        <td>{{$role->guard_name}}</td>
                        <td style="text-wrap: normal !important;">
                            @foreach($permissions as $permission)
                                <i class="icon icon-primitive-dot @if(@$role->hasPermissionTo($permission->name)) text-success @else text-grey-300 @endif"
                                   data-popup="tooltip" title="{{$permission->name}}" data-placement="top"></i>
                            @endforeach
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
