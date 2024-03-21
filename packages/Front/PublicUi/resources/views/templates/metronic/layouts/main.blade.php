<!DOCTYPE html>
<html lang="en">
<head>
    <!--=====================================
                META-TAG PART START
    =======================================-->
    <!-- REQUIRE META -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- AUTHOR META -->
    <meta name="author" content="Mironcoder">
    <meta name="email" content="mironcoder@gmail.com">
    <meta name="profile" content="https://themeforest.net/user/mironcoder">

    <!-- TEMPLATE META -->
    <meta name="name" content="Classicads">
    <meta name="type" content="Classified Advertising">
    <meta name="title" content="Classicads - Classified Events HTML Template">
    <meta name="keywords"
          content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
    <!--=====================================
                META-TAG PART END
    =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>{{ config('app.name', 'MabunuEvents') }}</title>

    <!--=====================================
                CSS LINK PART START
    =======================================-->
    <!-- FAVICON -->
    <link rel="icon" href="/templates/front/images/favicon.png">

    <!-- FONTS -->
    <link rel="stylesheet" href="/templates/front/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/templates/front/fonts/font-awesome/fontawesome.css">

    <!-- VENDOR -->
    <link rel="stylesheet" href="/templates/front/css/vendor/slick.min.css">
    <link rel="stylesheet" href="/templates/front/css/vendor/bootstrap.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="/templates/front/css/custom/main.css">


@yield('head')

@php
    $segmentOne = Request::segment(1);
    $segmentTwo = Request::segment(2);
    $segmentThree = Request::segment(3);
    $segmentFour = Request::segment(4);
@endphp

    <!--=====================================
                CSS LINK PART END
    =======================================-->
</head>
<body>


@include('PublicUi::templates.metronic.layouts.header')





@include('PublicUi::templates.metronic.layouts.menu')

@include('PublicUi::templates.metronic.layouts.banner')


<div class="w-lg-500px text-center  rounded p-10 p-lg-15 mx-auto">
    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif
    @section('messages')
        @include('PublicUi::templates.metronic.alerts.messages')
    @show
</div>
@yield('content-wrapper')

@include('PublicUi::templates.metronic.layouts.footer')

<!--=====================================
            JS LINK PART START
=======================================-->
<!-- VENDOR -->
<script src="/templates/front/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/templates/front/js/vendor/popper.min.js"></script>
<script src="/templates/front/js/vendor/bootstrap.min.js"></script>
<script src="/templates/front/js/vendor/slick.min.js"></script>

<!-- CUSTOM -->
<script src="/templates/front/js/custom/slick.js"></script>
<script src="/templates/front/js/custom/main.js"></script>

@yield('bottom')

<!--=====================================
            JS LINK PART END
=======================================-->
</body>
</html>







