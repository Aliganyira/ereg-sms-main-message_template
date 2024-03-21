@extends('ui::templates.limitless.layouts.layout_2')
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/components_popups.js"></script>
@endsection
@section('content-wrapper')

    <!-- Content area -->
    <div class="content p-0">

        <!-- Basic table -->
        <div class="card shadow-none rounded-0">

            <div class="card-header header-elements-inline">
                <h5 class="card-title">Users</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item badge badge-primary text-white"
                           href="{{route('users.create')}}"><i class="icon-pen"></i> New User</a>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <table class="table datatable-basic table-hover datatable-init nk-tb-list nk-tb-ulist">
                    <thead>
                    <tr class="table-active">
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('created_at')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('first_name')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('last_name')}}</th>
                        <th class="font-weight-bold text-uppercase" nowrap="">{{humanize('email')}}</th>
                        <th class="font-weight-bold text-uppercase" width="200">{{humanize('Roles')}}</th>
                        <th style="width: 8px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @php
                            $user_roles = $user->roles;
                            $roles = '';
                            foreach ($user_roles as $role) {
                                    $roles .= '<span class="badge badge-dark">'.humanize($role->name) . '</span> ';
                            }
                            $roles = trim($roles);
                            $roles = trim($roles, ',');
                        @endphp

                        <tr>
                            <td nowrap="">{{$user->created_at}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td class="font-weight-bold">{{$user->email}}</td>
                            <td nowrap="" >{!! $roles !!}</td>
                            <td><a class="btn btn-primary btn-sm text-nowrap" href="/admin/users/{{$user->id*date('Y')}}"><i
                                        class="icon-eye2"></i> View</a></td>
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
