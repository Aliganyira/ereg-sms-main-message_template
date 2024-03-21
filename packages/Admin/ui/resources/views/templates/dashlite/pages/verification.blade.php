{{--@extends('ui::templates.dashlite.layouts.admin.layout')--}}
@extends('ui::templates.dashlite.layouts.main.layout')
@section('content-wrapper')

    {{humanize(Request::segment(1))}}

@endsection
@section('bottom')

@endsection
