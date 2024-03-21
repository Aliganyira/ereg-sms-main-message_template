@extends('ui::templates.limitless.layouts.layout_2')
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/form_layouts.js"></script>
@endsection
@section('content-wrapper')
    @include('system-settings::custom-assets.form_select2')

    <!-- Content area -->
    <div class="content border-0">

        <div class="col-md-6">

            <!-- Static mode -->
            <div class="card border-0 shadow-0">
                <div class="card-header header-elements-inline d-none">
                    <h5 class="card-title">Add user</h5>
                </div>

                <div class="card-body">
                    <form action="/admin/users" method="post" autocomplete="off">
                        @csrf


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email:</label>
                            <div class="col-lg-9">
                                <input type="text" name="email" class="form-control" value="{{old('email')}}"
                                       placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name:</label>
                            <div class="col-lg-4">
                                <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}"
                                       placeholder="First name">
                            </div>
                            <div class="col-lg-5">
                                <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}"
                                       placeholder="Last name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Phone Number:</label>
                            <div class="col-lg-9">
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}"
                                       placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password:</label>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Confirm Password:</label>
                            <div class="col-lg-9">
                                <input type="password" name="password_confirmation" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Status:</label>
                            <div class="col-lg-9">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-input-styled" name="status" checked data-fouc>
                                        Active
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-input-styled" name="status" data-fouc>
                                        Suspended
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Your avatar:</label>
                            <div class="col-lg-9">
                                <div class="media mt-0">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="/templates/l/global_assets/images/placeholders/placeholder.jpg"
                                                 width="60" height="60" class="rounded-round" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <input type="file" class="form-input-styled" data-fouc>
                                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Roles:</label>
                            <div class="col-lg-9">
                                <select name="roles[]" multiple="multiple" data-placeholder="Select roles"
                                        class="form-control form-control-select2" data-fouc>

                                    @foreach($roles as $r)
                                        <option value="{{$r->name}}">{{humanize($r->name)}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        @if(Auth::user()->hasRole('organisation') && isset($departments))

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Department:</label>
                                <div class="col-lg-9">
                                    <select name="department" onchange="getOffices(this.value)" data-placeholder="Select Department"
                                            class="form-control form-control-select2" data-fouc>
                                        <option value="">Select Department</option>

                                        @foreach($departments as $r)
                                            <option value="{{$r->id}}">{{humanize($r->dept_name)}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            @if(isset($offices))
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Office:</label>
                                    <div class="col-lg-9">
                                        <select name="office" data-placeholder="Select Office"
                                                class="form-control form-control-select2" data-fouc id="offices">

                                            @foreach($offices as $r)
                                                <option value="{{$r->id}}">{{humanize($r->office_name)}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            @endif
                        @endif


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> </label>
                            <div class="col-lg-9">
                                <button type="submit" class="btn btn-danger font-weight-bold">Submit form <i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /static mode -->

        </div>

    </div>
    <!-- /content area -->

@endsection
@section('bottom')
    <script>

        function getOffices(departmentId) {

            fetch(`/admin/departments/get-offices/${departmentId}`).then((ress) => ress.json()).then((data) => {
                $('#offices').empty();
                $('#offices').append(`<option value="">Select Office</option>`);

                let office;
                let all = data
                for (office in all) {
                    $('#offices').append(`<option value="${all[office].id}">  ${all[office].office_name} </option>`);
                }
            });
        }
    </script>

@endsection
