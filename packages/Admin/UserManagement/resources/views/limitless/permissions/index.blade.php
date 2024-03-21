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
                        <span class="font-weight-semibold">Permissions</span>
                    </h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <span class="breadcrumb-item">Settings</span>
                        <span class="breadcrumb-item active">Permissions</span>
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements">
                    <div class="breadcrumb justify-content-center">
                        <a href="{{route('permissions.assign')}}" class=" btn btn-danger btn-sm rounded-round font-weight-bold">
                            <i class="icon-plus-circle2 mr-1"></i>
                            Assign Permission(s)
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content border-0 p-0">

            <!-- Basic table -->
            <div class="card shadow-none rounded-0 border-0" v-if="!this.$root.loading">

                <div class="table-responsive" v-if="!this.$root.loading">
                    <table class="table table-hover">
                        <tbody>

                        @foreach($permissions as $permission => $actions)
                        <tr v-for="(permission, index) in permissions">
                            <td class="font-weight-semibold" nowrap>
                                <div>{{$permission}}</div>
                            </td>
                            <td nowrap>
                                @foreach($actions as $action)
                                <span class="badge badge-primary font-weight-bold mr-1">{{$action}}</span>
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
