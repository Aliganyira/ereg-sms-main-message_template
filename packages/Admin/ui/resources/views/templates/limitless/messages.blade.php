@if ($errors->any())
    <div class="row m-1">
        <div class="col-md-12">


            <div class="d-block">
                @foreach ($errors->all() as $error)

                    <div class="alert bg-danger text-white alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span></span></button>
                        {!!  ucfirst($error)  !!}
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@endif

{{--@if (session('errors'))--}}
{{--    <div class="row  m-1">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="d-block">--}}
{{--                <div class="alert alert-danger border-0 alert-dismissible">--}}
{{--                    <button type="button" class="close" data-dismiss="alert"><span></span></button>--}}
{{--                    <span class="font-weight-semibold">Opps!</span>--}}
{{--                    <a href="#" class="alert-link">--}}
{{--                        {!!   ucfirst(session('errors'))  !!}--}}
{{--                    </a>.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}


@if (session('success'))
    <div class="row  m-1">
        <div class="col-md-12">
            <div class="d-block">
                <div class="alert bg-success text-white alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span></span></button>
                    {!!  ucfirst(session('success'))  !!}
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="row  m-1">
        <div class="col-md-12">
            <div class="d-block">
                <div class="alert alert-danger border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span></span></button>
                    <span class="font-weight-semibold">Opps!</span>
                    <a href="#" class="alert-link">
                        {!!   ucfirst(session('error'))  !!}
                    </a>.
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('info'))
    <div class="row  m-1">
        <div class="col-md-12">
            <div class="d-block">
                <div class="alert alert-primary border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span></span></button>
                    <span class="font-weight-semibold">!</span> <a href="#" class="alert-link">
                        {!!   ucfirst(session('info'))  !!}
                    </a>.
                </div>
            </div>
        </div>
    </div>
@endif


