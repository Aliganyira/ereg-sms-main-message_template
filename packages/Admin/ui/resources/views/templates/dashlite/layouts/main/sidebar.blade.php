<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="/" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="/images/logo-dark2x.png" srcset="/images/logo-dark2x.png 2x"
                     alt="logo">
                <img class="logo-dark logo-img" src="/images/logo-dark2x.png" srcset="/images/logo-dark2x.png 2x"
                     alt="logo-dark">

            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu">
                <!-- Menu -->
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title">Main</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="admin/home" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>

                    @hasanyrole('super-admin|admin|accountant-general|commissioner|director|bank|bank-account-manager|accounting-officer|head-of-finance|desk-officer')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                            <span class="nk-menu-text">Accounts</span>
                        </a>
                        <ul class="nk-menu-sub">
                            @can('accounts.view')
                                <li class="nk-menu-item">
                                    <a href="/account" class="nk-menu-link">
                                        <span class="nk-menu-text">Accounts</span>
                                    </a>
                                </li>
                            @endcan
                            @can('requests.view')
                                <li class="nk-menu-item">
                                    <a href="/requests" class="nk-menu-link">
                                        <span class="nk-menu-text">Requests</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                    @endrole
                    @hasanyrole('super-admin|admin|accountant-general')
                    <li class="nk-menu-item">
                        <a href="account-types" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                            <span class="nk-menu-text">Account Types</span>
                        </a>
                    </li>
                    @endrole
                    @hasanyrole('super-admin|admin|accountant-general')
                    <li class="nk-menu-item">
                        <a href="bank" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                            <span class="nk-menu-text">Banks</span>
                        </a>
                    </li>
                    @endrole
                    @hasanyrole('super-admin|admin')
                    <li class="nk-menu-item">
                        <a href="entities" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                            <span class="nk-menu-text">Entities</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="organisations" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                            <span class="nk-menu-text">Organisations</span>
                        </a>
                    </li>
                    @endrole
                    <li class="nk-menu-item">
                        <a href="my-profile" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text">My Profile</span>
                        </a>
                    </li>
                    @hasanyrole('super-admin|admin')
                    <li class="nk-menu-item">
                        <a href="KYC-application" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-text"></em></span>
                            <span class="nk-menu-text">KYC Application</span>
                        </a>
                    </li>
                    @endrole
                    <li class="nk-menu-heading">
                        <h6 class="overline-title">Others</h6>
                    </li>

                    @hasanyrole('super-admin|admin')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-files-fill"></em></span>
                            <span class="nk-menu-text">Communication</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="/mfi-requests" class="nk-menu-link">
                                    <span class="nk-menu-text">CBMS Requests Inbox/Outbox</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="/messaging" class="nk-menu-link">
                                    <span class="nk-menu-text">Email/Messaging</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="/support" class="nk-menu-link">
                                    <span class="nk-menu-text">Support Messaging</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="/verification" class="nk-menu-link">
                                    <span class="nk-menu-text">Biometric verification/NIRA integration</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                    @hasanyrole('super-admin|admin|organisation-admin')
                    <li class="nk-menu-item">
                        <a href="/admin/users" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text">User Accounts</span>
                        </a>
                    </li>
                    @endrole

                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
