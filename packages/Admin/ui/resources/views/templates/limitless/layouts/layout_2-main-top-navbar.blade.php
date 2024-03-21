<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark d-print-none mt-n1">

    <!-- Header with logos -->
    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
            <a href="/dashboard" class="d-inline-block">
                <img src="/images/logo.png" class="float-left mr-0" alt="">
                <span class="float-left text-default font-weight-bold pl-3"
                      style="font-size: 12px !important;">{{--Electronic Government Procurement--}}</span>
            </a>
        </div>

        <div class="navbar-brand navbar-brand-xs">
            <a href="/dashboard" class="d-inline-block">
                <img src="/images/logo.png" class="" alt="">
            </a>
        </div>
    </div>
    <!-- /header with logos -->


    <!-- Mobile controls -->
    <div class="d-flex flex-1 d-md-none">
        <div class="navbar-brand mr-auto">
            <a href="/dashboard" class="d-inline-block">
                <img src="/images/logo.png" alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <!-- /mobile controls -->


    <!-- Navbar content -->
    <div class="collapse navbar-collapse navbar-dark bg-dark" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>


        <ul class="navbar-nav">

            <li class="nav-item">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-puzzle4 mr-2"></i>
                    Horizontal Menu
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-puzzle4 mr-2"></i>
                    Single level
                </a>

                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="icon-google-drive"></i> Google Drive</a>
                    <a href="#" class="dropdown-item"><i class="icon-dropbox"></i> Dropbox</a>
                    <a href="#" class="dropdown-item"><i class="icon-dribbble3"></i> Dribbble</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-github"></i> Github</a>
                    <a href="#" class="dropdown-item"><i class="icon-stackoverflow"></i> Stack Overflow</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cube3 mr-2"></i>
                    Multi level
                </a>

                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="icon-IE"></i> Second level</a>
                    <div class="dropdown-submenu">
                        <a href="#" class="dropdown-item dropdown-toggle"><i class="icon-firefox"></i> Has child</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="icon-android"></i> Third level</a>
                            <div class="dropdown-submenu">
                                <a href="#" class="dropdown-item dropdown-toggle"><i class="icon-apple2"></i> Has child</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item"><i class="icon-html5"></i> Fourth level</a>
                                    <a href="#" class="dropdown-item"><i class="icon-css3"></i> Fourth level</a>
                                </div>
                            </div>
                            <a href="#" class="dropdown-item"><i class="icon-windows"></i> Third level</a>
                        </div>
                    </div>
                    <a href="#" class="dropdown-item"><i class="icon-chrome"></i> Second level</a>
                </div>
            </li>
        </ul>


        <ul class="navbar-nav  ml-xl-auto">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="/images/logo.png" class="rounded-circle mr-2" height="34" alt="">
                    <span>{{humanize(Auth::user()->first_name)}}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="/my-profile" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="/" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="/" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span
                            class="badge badge-pill bg-indigo-400 ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    {{--						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settingss</a>--}}
                    @if(auth()->user()->hasAnyRole('super-admin|admin'))
                        {{--                        @hasanyrole('super-admin|admin')--}}
                        <a href="/pde-settings" class="dropdown-item"> <i class="icon-cog5"></i> Settings </a>
                        {{--                        @endrole--}}
                    @endif
                    <a href="#" class="dropdown-item"
                       onclick="event.preventDefault();document.getElementById('form-logout').submit();">
                        <i class="icon-switch2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <!-- /navbar content -->


</div>
<!-- /main navbar -->
