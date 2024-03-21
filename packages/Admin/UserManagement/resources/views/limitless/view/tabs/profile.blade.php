<form method="POST" action="/update-profile" enctype="multipart/form-data">
@csrf
@method('POST')
<!-- Profile info -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Profile information.</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    {{--<a class="list-icons-item" data-action="remove"></a>--}}
                </div>
            </div>
        </div>


        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>First name</label>
                        <input name="first_name" readonly="readonly" type="text" value="{{@$user->first_name}}"
                               class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Last name</label>
                        <input name="last_name" readonly="readonly" type="text" value="{{@$user->last_name}}"
                               class="form-control">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Username</label>
                        <input name="user_name" readonly="readonly" type="text" value="{{@$user->username}}"
                               class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <input name="email" type="text" readonly="readonly" value="{{@$user->email}}"
                               class="form-control">
                        <input name="user_id" type="hidden" readonly="readonly" value="{{@$user->id}}"
                               class="form-control">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Phone #</label>
                        <input name="phone" type="text" value="{{@$user->phone}}" class="form-control">
                    </div>

                </div>
            </div>


            <div hidden class="text-right">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
    <!-- /profile info -->

    <!-- Account settings -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Password settings</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>

        <div class="card-body">


            <div class="form-group">
                <div
                    class="text text-info">{{strtoupper('If you are not going to change the password leave the text fields empty')}}</div>
                <div class="row">

                    <div class="col-md-6">
                        <label>New password</label>

                        @if ($errors->has('password'))
                            <span class="help-block text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                        <input type="password" name="password" placeholder="Enter new password"
                               class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Repeat password</label>
                        <input type="password" name="password_confirmation" placeholder="Repeat new password"
                               class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label>Current User Roles:</label>
                        <div class="text">


                            @foreach($user->roles as $role)
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="btn btn-link text-default dropdown-toggle" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="icon-arrow-right32 mr-2"></i> {{humanize($role->name)}}
                                    </a>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                        <a href="/admin/settings/delete/{{encode_id(@$user->id)}}/role/{{$role->name}}"
                                           class="dropdown-item"><i class="icon-trash"></i> delete</a>
                                    </div>
                                </li>

                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
            @if(Auth::user()->hasAnyRole('super-admin','admin','organisation-admin'))
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6">
                            <label>Roles:</label>
                            <select name="roles[]" multiple="multiple" data-placeholder="Select roles"
                                    class="form-control form-control-select2" data-fouc>

                                @foreach($roles as $r)
                                    <option value="{{$r->name}}">{{humanize($r->name)}}</option>
                                @endforeach

                            </select>
                        </div>


                    </div>
                </div>
            @endif


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
    <!-- /account settings -->

</form>


