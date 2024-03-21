@if ($errors->any())
    <div class="d-block row">
        @foreach ($errors->all() as $error)

            <div class="alert bg-danger text-white alert-dismissible">
{{--                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>--}}
                {!!  ucfirst($error)  !!}
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>

@endif

@if (session('success'))
    <div class="d-block row">
        <div class="alert bg-success text-white alert-dismissible">
{{--            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>--}}
            {!!  ucfirst(session('success'))  !!}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="d-block row">
        <div class="alert alert-danger border-0 alert-dismissible">
{{--            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>--}}
            <span class="font-weight-semibold">Opps!</span> <a href="#"
                                                               class="alert-link">{!!  ucfirst(session('error'))  !!}</a>.
        </div>
    </div>
@endif

@if (session('info'))
    <div class="d-block row">
        <div class="alert alert-primary border-0 alert-dismissible">
{{--            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>--}}
            <span class="font-weight-semibold">!</span> <a href="#"
                                                           class="alert-link">{!!  ucfirst(session('info'))  !!}</a>.
        </div>
    </div>
@endif


