@extends('ui::templates.limitless.layouts.layout_2')
@section('content-wrapper')



    <!-- Content area -->
    <div class="content border-0 p-0">

        <!-- Basic table -->
        <div class="card shadow-none rounded-0 border-0" v-if="!this.$root.loading">


            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{humanize(Request::segment(1))}}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="{{route('groups.assign')}}" class="ist-icons-item btn btn-danger btn-sm rounded-round font-weight-bold mr-2">
                            <i class="icon-users4 mr-1"></i>
                            Assign Group
                        </a>
                        <a href="{{route('groups.create')}}" class="ist-icons-item btn btn-danger btn-sm rounded-round font-weight-bold">
                            <i class="icon-plus-circle2 mr-1"></i>
                            Create Group
                        </a>

                    </div>
                </div>
            </div>


            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr class="table-active">
                            <th scope="col" class="font-weight-bold text-uppercase" nowrap="">Groups</th>
                            <th scope="col" class="font-weight-bold text-uppercase" nowrap="">Description</th>
                            <th scope="col" class="font-weight-bold text-uppercase" nowrap="">Roles</th>
                        </tr>

                        @foreach($groups as $group)
                            <tr>
                                <td class="cursor-pointer" nowrap>
                                    <div>{{$group->name}}</div>
                                </td>
                                <td class="cursor-pointer">{{$group->description}}</td>
                                <td class="cursor-pointer">
                                    @foreach($group->roles as $groupRole)
                                        <span class="badge badge-primary mr-2">{{$groupRole->role}}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
        <!-- /basic table -->

    </div>
    <!-- /content area -->


    <!-- Footer -->

    <!-- /footer -->

@endsection
