@php
    $user = Auth::user();
    $segmentOne = Request::segment(2);
    $segmentTwo = Request::segment(3);
    $segmentThree = Request::segment(4);
    $segmentFour = Request::segment(5);
@endphp

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md bg-dark d-print-none"
     style="margin-top: -50px !important;">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="/images/logo.png" width="38" height="38"
                                         alt=""></a>
                    </div>

                    <div class="media-body">
                          <span class="text-pink-400 mr-md-auto align-left"
                                title="{{isset(Auth::user()->organisation)?optional(Auth::user()->organisation)->name.' ':''}}">
                              {{isset(Auth::user()->organisation)?\Illuminate\Support\Str::limit(optional(Auth::user()->organisation)->name.' ',40):''}}
                          </span>

                        <div class="media-title font-weight-semibold">{{ humanize($user->first_name) }}</div>
                        @foreach(Auth::user()->roles as $r)
                            <div class="font-size-xs opacity-50">
                                <i class="icon-key font-size-sm"></i> &nbsp;{{humanize($r->name)}}
                            </div>
                        @endforeach
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Dashboards</div>
                    <i class="icon-menu" title="Main"></i>
                </li>


                @if ($user->hasRole('super-admin|admin|permanent-secretary|organisation-admin'))
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ $segmentOne == 'dashboard' ? 'active' : '' }}">
                            <i class="icon-home4"></i>
                            <span> Dashboard
{{--                                <span class="d-block font-weight-normal opacity-50">No active orders</span>--}}
                            </span>
                        </a>
                    </li>
                @endif

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div>
                    <i class="icon-menu" title="Main"></i>
                </li>

                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'mails' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-mailbox"></i> <span>Mail
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Mails/Documents">
                            @can('mails.view')
                                <li class="nav-item"><a href="{{route('mails.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'mails' && $segmentTwo == '' ? 'active' : '' }}">Mail
                                        List</a>
                                </li>
                            @endcan
                            @can('mails.create')
                                <li class="nav-item"><a href="{{route('mails.create')}}"
                                                        class="nav-link  {{ $segmentOne == 'mails' && $segmentTwo == 'create' ? 'active' : '' }}">Book
                                        Mail</a>
                                </li>
                            @endcan
                            @can('mails.create')
                                <li class="nav-item"><a href="{{route('mails.track')}}"
                                                        class="nav-link  {{ $segmentOne == 'mails' && $segmentTwo == 'track' ? 'active' : '' }}">Track
                                        Mail</a>
                                </li>
                            @endcan
                            @can('mails.create')
                                <li class="nav-item"><a href="{{route('exchange.receive')}}"
                                                        class="nav-link  {{ $segmentOne == 'mail-exchange' && $segmentTwo == 'receive' ? 'active' : '' }}">Receive</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if ($user->hasRole('super-admin|admin'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'messages' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-mailbox"></i> <span>Messages
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Mails/Documents">
                            @can('messages.view')
                                <li class="nav-item"><a href="{{route('messages.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'mails' && $segmentTwo == '' ? 'active' : '' }}">Mail
                                        Outgoing</a>
                                </li>
                                <li class="nav-item"><a href="{{route('messages.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'mails' && $segmentTwo == '' ? 'active' : '' }}">Mail
                                        Templates</a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endif


                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'mail-dispatch' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-mailbox"></i> <span>Mail Dispatch
                            </span>
                        </a>
                        <ul class="nav nav-group-sub" data-submenu-title="Mails/Dispatch">
                            @can('mails.view')
                                <li class="nav-item"><a href="{{route('dispatch.list')}}"
                                                        class="nav-link  {{ $segmentOne == 'mail-dispatch' && $segmentTwo == '' ? 'active' : '' }}">Dispatch List</a>
                                </li>
                            @endcan
                            @can('mails.create')
                                <li class="nav-item"><a href="{{route('dispatch.create')}}"
                                                        class="nav-link  {{ $segmentOne == 'mail-dispatch' && $segmentTwo == 'create' ? 'active' : '' }}">Create List</a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endif


                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'mails' && $segmentTwo == 'incoming' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-mailbox"></i> <span>Incoming Mails

                        </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Mails/Incoming">
                            @can('mails.view')
                                <li class="nav-item"><a href="{{route('mails.incoming')}}"
                                                        class="nav-link  {{ $segmentOne == 'mails' && $segmentTwo == 'incoming' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'mails' && $segmentTwo == 'outgoing' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-mailbox"></i> <span>Outgoing Mails

                        </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Mails/Outgoing">
                            @can('mails.view')
                                <li class="nav-item"><a href="{{route('mails.outgoing')}}"
                                                        class="nav-link  {{ $segmentOne == 'mails' && $segmentTwo == 'outgoing' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif


                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li hidden
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'mail-folders' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-mailbox"></i> <span>Mail Folders

                    </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="mail-folders/Documents">
                            @can('mails.view')
                                <li class="nav-item"><a href="{{route('mail-folders.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'mail-folders' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                            @can('mails.create')
                                <li class="nav-item"><a href="{{route('mail-folders.create')}}"
                                                        class="nav-link  {{ $segmentOne == 'mail-folders' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>
                                </li>

                            @endcan
                        </ul>
                    </li>
                @endif

                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li hidden
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'black-minutes' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-books"></i> <span>Black Minutes
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Black Minutes">
                            @can('black-minutes.view')
                                <li class="nav-item"><a href="{{route('black-minutes.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'black-minutes' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                            {{--                            @can('black-minutes.create')--}}
                            {{--                                <li class="nav-item"><a href="{{route('black-minutes.create')}}"--}}
                            {{--                                                        class="nav-link  {{ $segmentOne == 'black-minutes' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>--}}
                            {{--                                </li>--}}
                            {{--                            @endcan--}}
                        </ul>
                    </li>
                @endif



                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li hidden
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'delivery-book' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-mailbox"></i> <span>Delivery book
                        </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="deliverybook/Documents">
                            @can('mails.view')
                                <li class="nav-item"><a href="{{route('delivery-book.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'delivery-book' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                            @can('mails.create')
                                <li class="nav-item"><a href="{{route('delivery-book.create')}}"
                                                        class="nav-link  {{ $segmentOne == 'delivery-book' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif




                @if ($user->hasRole('super-admin|admin'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'reporting' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-file-stats2"></i> <span>Reporting
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Reporting">
                            @can('reports.view')
                                <li class="nav-item"><a href="#"
                                                        class="nav-link {{ $segmentOne == 'reporting' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                            @can('reports.view')
                                <li class="nav-item"><a href="#"
                                                        class="nav-link {{ $segmentOne == 'reporting' ? 'active' : '' }}">Mail
                                        Report</a>
                                </li>
                            @endcan
                            @can('reports.create')
                                <li class="nav-item"><a href="#" class="nav-link">Custom</a></li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if ($user->hasRole('super-admin|admin'))
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">Settings</div>
                        <i class="icon-menu" title="Main"></i>
                    </li>
                @endif



                @can('organisations.void')

                @if ($user->hasRole('super-admin|admin'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'organisations' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-city"></i> <span>Organisations
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Organisations">
                            @can('organisations.view')
                                <li class="nav-item"><a href="{{route('organisations.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'organisations' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                            @can('organisations.create')
                                <li class="nav-item"><a href="{{route('organisations.create')}}"
                                                        class="nav-link  {{ $segmentOne == 'organisations' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @endcan
                @can('departments.void')

                @if ($user->hasRole('super-admin|admin|organisation'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'departments' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-books"></i> <span>Departments
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Departments">
                            @can('departments.view')
                                <li class="nav-item"><a href="{{route('departments.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'departments' && ($segmentTwo == ''||$segmentThree == 'users') ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                            @can('departments.create')
                                <li class="nav-item"><a href="{{route('departments.create')}}"
                                                        class="nav-link  {{ $segmentOne == 'departments' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @endcan

                @can('offices.void')

                    @if ($user->hasRole('super-admin|admin|organisation'))
                        <li
                            class="nav-item nav-item-submenu   {{ $segmentOne == 'offices' ? ' nav-item-expanded nav-item-open' : '' }}">
                            <a href="#" class="nav-link"><i class="icon-city"></i> <span>Offices
                            </span>
                            </a>

                            <ul class="nav nav-group-sub" data-submenu-title="Offices">
                                @can('offices.view')
                                    <li class="nav-item"><a href="{{route('offices.index')}}"
                                                            class="nav-link  {{ $segmentOne == 'offices' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                    </li>
                                @endcan
                                @can('offices.create')
                                    <li class="nav-item"><a href="{{route('offices.create')}}"
                                                            class="nav-link  {{ $segmentOne == 'offices' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                @endcan


                @if ($user->hasRole('super-admin|admin'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'mail-subjects' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-books"></i> <span>Mail Subjects
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Mail Subjects">
                            @can('mail-subjects.view')
                                <li class="nav-item"><a href="{{route('mail-subjects.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'mail-subjects' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                            @can('mail-subjects.create')
                                <li class="nav-item"><a href="{{route('mail-subjects.create')}}"
                                                        class="nav-link  {{ $segmentOne == 'mail-subjects' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif



                @if ($user->hasRole('super-admin|admin'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'notifications' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-bubbles4"></i> <span>Notifications
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="Mail Subjects">
                            @can('mail-subjects.view')
                                <li class="nav-item"><a href="{{route('notifications.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'notifications' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif






                @if ($user->hasRole('super-admin|admin|organisation-admin'))

                    <li class="nav-item nav-item-submenu {{ $segmentOne == 'users'|| $segmentOne == 'groups' ||  $segmentOne == 'roles'  ||  $segmentOne == 'permissions' || $segmentOne == 'registry-attendants' || $segmentOne == 'delivery-agents' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-users4"></i> <span>User Management</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="User Management">
                            <li class="nav-item"><a href="{{route('users.index')}}"
                                                    class="nav-link {{ $segmentOne == 'users'|| $segmentOne == 'groups' ||  $segmentOne == 'roles'  ||  $segmentOne == 'permissions' ? 'active' : '' }}">Users</a>
                            </li>
                            @if ($user->hasRole('super-admin|admin'))
                                <li class="nav-item"><a href="/admin/groups"
                                                        class="nav-link {{ $segmentOne == 'groups' ? 'active' : '' }}">Groups</a>
                                </li>
                            @endif
                            @if ($user->hasRole('super-admin|admin'))
                                <li class="nav-item"><a href="/admin/roles"
                                                        class="nav-link {{ $segmentOne == 'roles' ? 'active' : '' }}">Roles</a>
                                </li>
                            @endif
                            @if ($user->hasRole('super-admin|admin'))
                                <li class="nav-item"><a href="/admin/permissions"
                                                        class="nav-link {{ $segmentOne == 'permissions' ? 'active' : '' }}">Permissions</a>
                                </li>
                            @endif


                            @can('registry-attendants.view')
                                <li class="nav-item"><a href="{{route('registry-attendants.index')}}"
                                                        class="nav-link  {{ $segmentOne == 'registry-attendants' && $segmentTwo == '' ? 'active' : '' }}">Registry Attendants</a>
                                </li>
                            @endcan

                            @if ($user->hasRole('super-admin|admin|organisation'))
                                <li
                                    class="nav-item nav-item-submenu   {{ $segmentOne == 'delivery-agents' ? ' nav-item-expanded nav-item-open' : '' }}">
                                    <a href="#" class="nav-link"><i class="icon-truck"></i> <span>Delivery Agents
                            </span>
                                    </a>

                                    <ul class="nav nav-group-sub" data-submenu-title="Delivery Agents/Messengers">
                                        @can('delivery-agents.view')
                                            <li class="nav-item"><a href="{{route('delivery-agents.index')}}"
                                                                    class="nav-link  {{ $segmentOne == 'delivery-agents' && $segmentTwo == '' ? 'active' : '' }}">All</a>
                                            </li>
                                        @endcan
                                        @can('delivery-agents.create')
                                            <li class="nav-item"><a href="{{route('delivery-agents.create')}}"
                                                                    class="nav-link  {{ $segmentOne == 'delivery-agents' && $segmentTwo == 'create' ? 'active' : '' }}">New</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif



                        </ul>
                    </li>
                @endif

                @if ($user->hasRole('super-admin|admin'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'settings' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-cog"></i> <span>Audit Logs
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="System Settings">

                            <li class="nav-item"><a href="#" class="nav-link">All</a></li>
                        </ul>
                    </li>

                @endif
                @if ($user->hasRole('super-admin'))
                    <li
                        class="nav-item nav-item-submenu   {{ $segmentOne == 'settings' ? ' nav-item-expanded nav-item-open' : '' }}">
                        <a href="#" class="nav-link"><i class="icon-cog"></i> <span>System Settings
                            </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="System Settings">

                            <li class="nav-item"><a href="/calender" class="nav-link">Calendar Events</a></li>
                        </ul>
                    </li>

                @endif

                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs "></div>
                    <i class="icon-switch2" title="Logout"></i>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault();document.getElementById('form-logout').submit();">
                        <i class="icon-switch2"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
