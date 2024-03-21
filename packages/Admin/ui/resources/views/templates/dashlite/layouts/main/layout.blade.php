<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/">
    <meta charset="utf-8">
    <meta name="author" content="Dennis Tamale(tamaledns@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/images/logo-dark2x.png">
    <!-- Page Title  -->
    <title>{{ config('app.name', 'HPV') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="/templates/d-main/assets/css/dashlite.css?ver=1.6.0">
    <link id="skin-default" rel="stylesheet" href="/templates/d-main/assets/css/theme.css?ver=1.6.0">

    @yield('head')
</head>


<body class="nk-body bg-lighter npc-general has-sidebar">

<form id="form-logout" ref="form-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->

    {{--        @include('ui::templates.dashlite.layouts.admin.sidebar')--}}
    @include('ui::templates.dashlite.layouts.main.sidebar')
    @php
        $user=Auth::user();
        $roles = $user->roles->where('name', '!=', 'portal-access');
    if($user->hasRole('organisation')){
         $org=Auth::user()->organisation;
        $name= isset($org->entity_name)?$org->entity_name:'Home';
      }elseif($user->hasRole('bank')){
          $bank= Auth::user()->bank;
          $name=isset($bank->name)?$bank->name:'Home';
      }else{
          $name=false;
      }
    @endphp
    <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ml-n1">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                    class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand d-xl-none">
                            <a href="/" class="logo-link">
                                <img class="logo-light logo-img" src="/images/logo.png" srcset="/images/logo2x.png 2x"
                                     alt="logo">
                                <img class="logo-dark logo-img" src="/images/logo-dark.png"
                                     srcset="/images/logo-dark2x.png 2x" alt="logo-dark">
                                <span class="nio-version">CBMS</span>
                            </a>
                        </div>
                        <div class="nk-header-news d-none d-xl-block">
                            <div class="nk-news-list">
                                <a class="nk-news-item" href="#">
                                    <div class="nk-news-icon">
                                        <em class="icon ni ni-card-view"></em>
                                    </div>
                                    <div class="nk-news-text">
                                        <p>{!! $name!=false?$name:'Computerized Bank Account Management System <span> (CBMS)</span>' !!}
                                        </p>
                                        <em class="icon ni ni-external"></em>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-md-block">
                                                <div class="user-status user-status-unverified">Account</div>
                                                <div
                                                    class="user-name dropdown-indicator">{{Auth::user()->first_name}}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>{{ substr(Auth::user()->first_name, 0, 1)}}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{Auth::user()->first_name}}</span>
                                                    <span class="sub-text">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner user-account-info">
                                            <h6 class="overline-title-alt">Roles</h6>


                                            <div class="user-balance">  @if($roles->count() == 1)
                                                    Role: <span
                                                        class="font-weight-bold">{{isset($roles->first()->name) ? role_name($roles->first()->name) : 'N/A'}}</span>
                                                @else
                                                    {{number_format($roles->count())}} Role(s) - <span
                                                        class="font-weight-bold">{{isset($roles->first()->name) ? role_name($roles->first()->name) : 'N/A'}}</span>
                                                @endif </div>

                                            @foreach($roles as $role)

                                                <div class="user-balance-sub">
{{--                                                    {{role_name($role->name)}}--}}
                                                    {{humanize($role->name)}}
                                                </div>
                                            @endforeach


                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="/my-profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li>
                                                    <a onclick="event.preventDefault();document.getElementById('form-logout').submit();"
                                                       href="#"><em
                                                            class="icon ni ni-signout"></em><span>Sign out</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown notification-dropdown mr-n1">
                                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                        <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                        <div class="dropdown-head">
                                            <span class="sub-title nk-dropdown-title">Notifications</span>
                                            <a href="#">Mark All as Read</a>
                                        </div>
                                        <div class="dropdown-body">
                                            <div class="nk-notification">
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">You have requested to <span>Widthdrawl</span>
                                                        </div>
                                                        <div class="nk-notification-time">2 hrs ago</div>
                                                    </div>
                                                </div><!-- .dropdown-inner -->
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">Your
                                                            <span>Deposit Order</span> is placed
                                                        </div>
                                                        <div class="nk-notification-time">2 hrs ago</div>
                                                    </div>
                                                </div><!-- .dropdown-inner -->
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">You have requested to <span>Widthdrawl</span>
                                                        </div>
                                                        <div class="nk-notification-time">2 hrs ago</div>
                                                    </div>
                                                </div><!-- .dropdown-inner -->
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">Your
                                                            <span>Deposit Order</span> is placed
                                                        </div>
                                                        <div class="nk-notification-time">2 hrs ago</div>
                                                    </div>
                                                </div><!-- .dropdown-inner -->
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">You have requested to <span>Widthdrawl</span>
                                                        </div>
                                                        <div class="nk-notification-time">2 hrs ago</div>
                                                    </div>
                                                </div><!-- .dropdown-inner -->
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">Your
                                                            <span>Deposit Order</span> is placed
                                                        </div>
                                                        <div class="nk-notification-time">2 hrs ago</div>
                                                    </div>
                                                </div><!-- .dropdown-inner -->
                                            </div>
                                        </div><!-- .nk-dropdown-body -->
                                        <div class="dropdown-foot center">
                                            <a href="#">View All</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content">
                <div class="container-fluid">
                    <div class="nk-content-body">

                        <!-- Page header -->
                        <div class="page-header page-header-light">
                            <div class="page-header-content header-elements-md-inline">
                                <div class="page-title d-flex">
                                    <h4>
                                        <i class="icon-files-empty2 mr-2"></i>
                                        <span
                                            class="font-weight-semibold">{{isset($title)?humanize($title):humanize(Request::segment(1))}}</span>
                                    </h4>
                                    <a href="#" class="header-elements-toggle text-default d-md-none"><i
                                            class="icon-more"></i></a>
                                </div>

                            </div>

                            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                                <div class="d-flex">
                                    <div class="breadcrumb">

                                        <a href="/" class="breadcrumb-item"><i
                                                class="icon-home2 mr-2"></i> {{$name!=false?$name:''}}
                                        </a>
                                        <a href="/{{Request::segment(1)}}"
                                           class="breadcrumb-item">{{isset($title)?humanize($title):humanize(Request::segment(1))}}</a>
                                        <span
                                            class="breadcrumb-item active">{{isset($subtitle)?humanize($subtitle):humanize(Request::segment(2))}}</span>
                                    </div>

                                    <a href="#" class="header-elements-toggle text-default d-md-none"><i
                                            class="icon-more"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /page header -->


                        @include('ui::templates.limitless.messages')
                        @yield('content-wrapper')
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-footer nk-footer-fluid">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; {{date('Y')}} {{ config('app.name', 'GovMail') }}.
                            by <a href="#">GovMail</a>
                        </div>
                        <div class="nk-footer-links">
                            <ul class="nav nav-sm">
                                <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="/templates/d-main/assets/js/bundle.js?ver=1.6.0"></script>
<script src="/templates/d-main/assets/js/scripts.js?ver=1.6.0"></script>

@yield('bottom')
</body>

</html>
