@extends('ui::templates.limitless.layouts.layout_2')
@section('content-wrapper')

    <!-- Content area -->
    <div class="content border-0">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Create Roles</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="{{route('groups.index')}}" class=" list-icons-item btn btn-danger btn-sm rounded-round font-weight-bold">
                            <i class="icon-plus-circle2 mr-1"></i>
                            Groups
                        </a>
{{--                        <a class="list-icons-item" data-action="collapse"></a>--}}
{{--                        <a class="list-icons-item" data-action="reload"></a>--}}
{{--                        <a class="list-icons-item" data-action="remove"></a>--}}
                    </div>
                </div>
            </div>


            <div class="card-body">

                <form action="{{route('groups.store')}}" method="post" autocomplete="off">
                    @csrf


                    <div class="card p-0 shadow-none border-0">
                        <div class="card-body p-0">

                            <div class="form-group row">

                                <label class="col-lg-3 col-form-label">Group name</label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}"
                                           placeholder="Group Name">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-9 offset-3">
                                    <button type="submit" class="btn btn-danger font-weight-bold">
                                        <i class="icon-users4 mr-1"></i> Create Group
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>

        </div>
        <!-- /content area -->

@endsection
