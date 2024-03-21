@extends('ui::templates.limitless.layouts.layout_2')
@section('head')
    <script src="/templates/l/global_assets/js/demo_pages/form_layouts.js"></script>
@endsection
@section('content-wrapper')



    <!-- Content area -->
    <div class="content p-0">

        <!-- Static mode -->
        <div class="card border-0 shadow-0">
            <div class="card-header header-elements-inline d-none">
                <h5 class="card-title">Assign Moderator</h5>
            </div>
            <!-- Basic table -->
            <div class="card shadow-none rounded-0">

                <div class="card-header header-elements-inline">
                    <h5 class="card-title">{{humanize(Request::segment(2))}} {{humanize(Request::segment(3))}}</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            {{--                        <a class="list-icons-item badge badge-primary text-white" href="{{route(Request::segment(2).'.create')}}"><i class="icon-pen"></i> New</a>--}}
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">

                                <h4 class="font-weight-semibold mb-1">
                                    <a href="#" class="text-default">{{$msisdn}}</a>
                                    <a href="#" class="text-primary  float-right">{{$records->count()}} Message(s)</a>

                                </h4>


                                <!-- Top aligned -->
                                <div class="card card-body border-top-teal">
                                    <div class="list-feed">
                                        @foreach($records as $record)
                                            <div class="list-feed-item">
                                                <div class="text-muted">{{$record->created_at}}
                                                    <span class="float-right">Moderator : {{optional($record->moderator)->first_name}} {{optional($record->moderator)->last_name}}</span>
                                                </div>
                                                <div class="text-muted float-right"></div>
                                                @php $status=status($record->moderation_status); @endphp
                                                <a href="#" class=" {{@$status->text_alert}}">{{@$status->name}}</a>

                                                @if(Request::segment(3)=='show-ivr')
                                                    <br/>
                                                    <audio controls>
                                                        <source src="{{asset($record->path)}}" type="audio/wav">
                                                    </audio>
                                                @else
                                                    {{$record->message}}
                                                @endif

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <!-- /top aligned -->


                            </div>

                        </div>
                        <div class="col-md-6">

                            @if($records[0]->moderated_by=='')

                                <form action="{{route(Request::segment(2).'.assign-moderators')}}" method="post"
                                      autocomplete="off">
                                    @csrf
                                    <div class="card-body">

                                        <input type="hidden" name="id[]" value="{{$msisdn}}">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Moderator:</label>
                                            <div class="col-lg-9">
                                                <select name="moderator" class="form-control form-control-select2 "
                                                        data-placeholder="Select Moderator" data-fouc required>
                                                    <option value="{{old('moderator')}}"> Select Moderator</option>
                                                    @foreach($moderators as $m)
                                                        <option
                                                            value="{{$m->id}}" {{(isset($record->moderated_by)?$record->moderated_by:old('status'))==$m->id?'selected':''}}>
                                                            {{optional($m)->first_name}} {{optional($m)->last_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"> </label>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn btn-primary font-weight-bold" name="action" value="{{Request::segment(3)=='show-ivr'?'voice':'sms'}}">Assign
                                                <i class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="alert alert-info">Participant has already been assigned a moderator</div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            <!-- /basic table -->
        </div>
    </div>
    <!-- /content area -->
@endsection
@section('bottom')
@endsection
