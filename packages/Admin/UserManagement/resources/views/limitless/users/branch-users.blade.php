

@extends(Auth::user()->hasRole('super-admin')?'ui::templates.limitless.layouts.layout_2':'ui::templates.limitless.layouts.layout_5')
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
                    <span class="font-weight-semibold">Branch Users</span>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Users</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements">
                <div class="breadcrumb justify-content-center">
                    <a href="/admin/users/create" class=" btn btn-danger btn-sm font-weight-bold">
                        <i class="icon-plus-circle2 mr-1"></i>
                        Create User
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
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('created_at')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('first_name')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('last_name')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('email')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('email_verified_at')}}</th>
                        <th></th>
                    </tr>

                    @foreach($branch_users as $branch_user)
                    <tr>
                        <td nowrap="">{{$branch_user->user->created_at}}</td>
                        <td>{{$branch_user->user->first_name}}</td>
                        <td>{{$branch_user->user->last_name}}</td>
                        <td class="font-weight-bold">{{$branch_user->user->email}}</td>
                        <td nowrap="">{{$branch_user->user->email_verified_at}}</td>
                        <td> <a class="btn btn-primary btn-sm text-nowrap" href="/admin/users/{{$branch_user->user->id*date('Y')}}"><i class="icon-eye2"></i> View User</a></td>
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
