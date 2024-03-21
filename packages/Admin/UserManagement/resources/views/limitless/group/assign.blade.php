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
                    <span class="font-weight-semibold">Assign Groups</span>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item">Settings</span>
                    <span class="breadcrumb-item">Groups</span>
                    <span class="breadcrumb-item active">Assign</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements">
                <div class="breadcrumb justify-content-center">
                    <a href="{{route('roles.index')}}" class=" btn btn-danger btn-sm rounded-round font-weight-bold">
                        <i class="icon-plus-circle2 mr-1"></i>
                        Groups
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
                    <h6 class="card-title">Assign Groups to User</h6>
                </div>


                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        @if ($selectGroups)
                            <li class="nav-item"><a href="{{route('groups.assign')}}" class="nav-link">Select User</a></li>
                            <li class="nav-item"><a href="#bottom-tab2" class="nav-link active font-weight-bold">Assign Groups</a></li>
                        @else
                            <li class="nav-item"><a href="{{route('groups.assign')}}" class="nav-link active font-weight-bold">Select User</a></li>
                            <li class="nav-item"><a href="#bottom-tab2" class="nav-link">Assign Groups</a></li>
                        @endif
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade @if (!$selectGroups) show active @endif" id="bottom-tab1">

                            <form action="{{route('groups.assign-on-select-user')}}" method="post" autocomplete="off">
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

                        <div class="tab-pane fade @if ($selectGroups) show active @endif" id="bottom-tab2">

                            @if ($selectGroups)

                                <form action="{{route('groups.assign-store')}}" method="post" autocomplete="off">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{$user->id}}">

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                            <select name="group_id" class="form-control select" data-fouc>
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}" @if($user->groupsArray && in_array($group->id, $user->groupsArray)) selected @endif>
                                                        {{$group->name}}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    {{--
                                    @foreach($groups as $group)
                                        <div class="form-group row">

                                            <div class="col-lg-12 ml-3">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox"
                                                           class="custom-control-input"
                                                           name="group_id"
                                                           id="{{$group->name}}"
                                                           value="{{$group->name}}"
                                                           @if($user->groups && in_array($group->id, $user->groups)) checked @endif>
                                                    <label class="custom-control-label" for="{{$group->name}}">{{$group->name}}</label>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    --}}

                                    <div class="form-group row">
                                        <div class="col-lg-10">
                                            <a href="{{route('groups.assign')}}" class="btn btn-primary font-weight-bold">
                                                <i class="icon-chevron-left mr-1"></i> Select User
                                            </a>

                                            <button type="submit" class="btn btn-danger font-weight-bold">
                                                <i class="icon-user-lock mr-1"></i> Assign Group to User
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
