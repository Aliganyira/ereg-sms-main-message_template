<div class="nk-sidebar nk-sidebar-fat nk-sidebar-fixed" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="/" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="/images/logo-dark2x.png" srcset="/images/logo-dark2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="/images/logo-dark2x.png" srcset="/images/logo-dark2x.png 2x" alt="logo-dark">
                <span class="nio-version">GovMail system</span>
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-widget d-none d-xl-block">
                    <div class="user-account-info between-center">
                        <div class="user-account-main">
                            <h6 class="overline-title-alt">Available Balance</h6>
                            <div class="user-balance">2.014095 <small class="currency currency-btc">UGX</small></div>
                            <div class="user-balance-alt">18,934.84 <span class="currency currency-btc">UGX</span></div>
                        </div>
                        <a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                    </div>
                    <ul class="user-account-data gy-1">
                        <li>
                            <div class="user-account-label">
                                <span class="sub-text">Profits (7d)</span>
                            </div>
                            <div class="user-account-value">
                                <span class="lead-text">+ 0.0526 <span class="currency currency-btc">UGX</span></span>
                                <span class="text-success ml-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
                            </div>
                        </li>
                        <li>
                            <div class="user-account-label">
                                <span class="sub-text">Deposit in orders</span>
                            </div>
                            <div class="user-account-value">
                                <span class="sub-text">0.005400 <span class="currency currency-btc">UGX</span></span>
                            </div>
                        </li>
                    </ul>
                    <div class="user-account-actions">
                        <ul class="g-3">
                            <li><a href="#" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
                            <li><a href="#" class="btn btn-lg btn-warning"><span>Withdraw</span></a></li>
                        </ul>
                    </div>
                </div><!-- .nk-sidebar-widget -->
                <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                    <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                        <div class="user-card-wrap">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <span>AB</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">{{Auth::user()->first_name}}</span>
                                    <span class="sub-text">{{Auth::user()->email}}</span>
                                </div>
                                <div class="user-action">
                                    <em class="icon ni ni-chevron-down"></em>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                        <div class="user-account-info between-center">
                            <div class="user-account-main">
                                <h6 class="overline-title-alt">Available Balance</h6>
                                <div class="user-balance">2.014095 <small class="currency currency-btc">UGX</small></div>
                                <div class="user-balance-alt">18,934.84 <span class="currency currency-btc">UGX</span></div>
                            </div>
                            <a href="#" class="btn btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                        </div>
                        <ul class="user-account-data">
                            <li>
                                <div class="user-account-label">
                                    <span class="sub-text">Profits (7d)</span>
                                </div>
                                <div class="user-account-value">
                                    <span class="lead-text">+ 0.0526 <span class="currency currency-btc">UGX</span></span>
                                    <span class="text-success ml-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
                                </div>
                            </li>
                            <li>
                                <div class="user-account-label">
                                    <span class="sub-text">Deposit in orders</span>
                                </div>
                                <div class="user-account-value">
                                    <span class="sub-text text-base">0.005400 <span class="currency currency-btc">UGX</span></span>
                                </div>
                            </li>
                        </ul>
                        <ul class="user-account-links">
                            <li><a href="#" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a></li>
                            <li><a href="#" class="link"><span>Deposit Funds</span> <em class="icon ni ni-wallet-in"></em></a></li>
                        </ul>
                        <ul class="link-list">
                            <li><a href="my-profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                            <li><a href="profile-security"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                            <li><a href="login-activity"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                        </ul>
                        <ul class="link-list">
                            <li><a href="#" onclick="event.preventDefault();document.getElementById('form-logout').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                        </ul>
                    </div>
                </div><!-- .nk-sidebar-widget -->
                <div class="nk-sidebar-menu">
                    <!-- Menu -->
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title">Menu</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="/admin/home" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="accounts" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                                <span class="nk-menu-text">Accounts</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="wallets" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                <span class="nk-menu-text">Wallets</span>
                            </a>
                        </li>
                        <li hidde class="nk-menu-item">
                            <a href="buy-sell" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                <span class="nk-menu-text">Buy / Sell</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="orders" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                                <span class="nk-menu-text">Orders</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="my-profile" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                <span class="nk-menu-text">My Profile</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="KYC-application" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-file-text"></em></span>
                                <span class="nk-menu-text">KYC Application</span>
                            </a>
                        </li>
                        <li class="nk-menu-heading">
                            <h6 class="overline-title">Additionals</h6>
                        </li>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-files-fill"></em></span>
                                <span class="nk-menu-text">Other Features</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="/mfi-requests" class="nk-menu-link">
                                        <span class="nk-menu-text">MFI Request Inbox/Request Replies Outbox</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/messaging" class="nk-menu-link">
                                        <span class="nk-menu-text">Email/Messaging</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/support"  class="nk-menu-link">
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

                        <li class="nk-menu-item">
                            <a href="/appraisals" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                <span class="nk-menu-text">Appraisals</span>
                            </a>
                        </li>

                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->

                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-footer">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                <span class="nk-menu-text">Support</span>
                            </a>
                        </li>
                        <li class="nk-menu-item ml-auto">
                            <div class="dropup">
                                <a href="#" class="nk-menu-link dropdown-indicator has-indicator" data-toggle="dropdown" data-offset="0,10">
                                    <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                    <span class="nk-menu-text">English</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="language-list">
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="/templates/d/images/flags/english.png" alt="" class="language-flag">
                                                <span class="language-name">English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="/templates/d/images/flags/spanish.png" alt="" class="language-flag">
                                                <span class="language-name">Español</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="/templates/d/images/flags/french.png" alt="" class="language-flag">
                                                <span class="language-name">Français</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src="/templates/d/images/flags/turkey.png" alt="" class="language-flag">
                                                <span class="language-name">Türkçe</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul><!-- .nk-footer-menu -->
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-contnet -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
