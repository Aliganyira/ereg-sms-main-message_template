@extends('ui::templates.limitless.layouts.layout_5')
@section('head')
<script src="/templates/l/global_assets/js/demo_pages/dashboard.js"></script>
@endsection
@section('content-wrapper')
<!-- Content area -->
<div class="content">


    <div class="alert alert-styled-left alert-info">Dashboard Coming Soon !!!</div>

    <!-- Dashboard content -->
    <div hidden class="row">
        <div class="col-xl-8">


            <!-- Quick stats boxes -->
            <div class="row">
                <div class="col-lg-4">

                    <!-- Members online -->
                    <div class="card bg-teal-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">3,450</h3>
                                <span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span>
                            </div>

                            <div>
                                Members online
                                <div class="font-size-sm opacity-75">489 avg</div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div id="members-online"></div>
                        </div>
                    </div>
                    <!-- /members online -->

                </div>

                <div class="col-lg-4">

                    <!-- Current server load -->
                    <div class="card bg-pink-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">49.4%</h3>
                                <div class="list-icons ml-auto">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                            <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                            <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                            <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                Current server load
                                <div class="font-size-sm opacity-75">34.6% avg</div>
                            </div>
                        </div>

                        <div id="server-load"></div>
                    </div>
                    <!-- /current server load -->

                </div>

                <div class="col-lg-4">

                    <!-- Today's revenue -->
                    <div class="card bg-blue-400">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">$18,390</h3>
                                <div class="list-icons ml-auto">
                                    <a class="list-icons-item" data-action="reload"></a>
                                </div>
                            </div>

                            <div>
                                Today's revenue
                                <div class="font-size-sm opacity-75">$37,578 avg</div>
                            </div>
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                    <!-- /today's revenue -->

                </div>
            </div>
            <!-- /quick stats boxes -->


            <!-- Marketing campaigns -->
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Marketing campaigns</h6>
                    <div class="header-elements">
                        <span class="badge bg-success badge-pill">28 active</span>
                        <div class="list-icons ml-3">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                    <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                    <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
                    <div class="d-flex align-items-center mb-3 mb-sm-0">
                        <div id="campaigns-donut"></div>
                        <div class="ml-3">
                            <h5 class="font-weight-semibold mb-0">38,289 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> (+16.2%)</span></h5>
                            <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">May 12, 12:30 am</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3 mb-sm-0">
                        <div id="campaign-status-pie"></div>
                        <div class="ml-3">
                            <h5 class="font-weight-semibold mb-0">2,458 <span class="text-danger font-size-sm font-weight-normal"><i class="icon-arrow-down12"></i> (-4.9%)</span></h5>
                            <span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">Jun 4, 4:00 am</span>
                        </div>
                    </div>

                    <div>
                        <a href="#" class="btn bg-indigo-300"><i class="icon-statistics mr-2"></i> View report</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th>Campaign</th>
                            <th>Client</th>
                            <th>Changes</th>
                            <th>Budget</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-active table-border-double">
                            <td colspan="5">Today</td>
                            <td class="text-right">
                                <span class="progress-meter" id="today-progress" data-progress="30"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/brands/facebook.png" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Facebook</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark border-blue mr-1"></span>
                                            02:00 - 03:00
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">Mintlime</span></td>
                            <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 2.43%</span></td>
                            <td><h6 class="font-weight-semibold mb-0">$5,489</h6></td>
                            <td><span class="badge bg-blue">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/brands/youtube.png" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Youtube videos</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark border-danger mr-1"></span>
                                            13:00 - 14:00
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">CDsoft</span></td>
                            <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 3.12%</span></td>
                            <td><h6 class="font-weight-semibold mb-0">$2,592</h6></td>
                            <td><span class="badge bg-danger">Closed</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/brands/spotify.png" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Spotify ads</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark border-grey-400 mr-1"></span>
                                            10:00 - 11:00
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">Diligence</span></td>
                            <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 8.02%</span></td>
                            <td><h6 class="font-weight-semibold mb-0">$1,268</h6></td>
                            <td><span class="badge bg-grey-400">On hold</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/brands/twitter.png" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Twitter ads</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark border-grey-400 mr-1"></span>
                                            04:00 - 05:00
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">Deluxe</span></td>
                            <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 2.78%</span></td>
                            <td><h6 class="font-weight-semibold mb-0">$7,467</h6></td>
                            <td><span class="badge bg-grey-400">On hold</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="table-active table-border-double">
                            <td colspan="5">Yesterday</td>
                            <td class="text-right">
                                <span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/brands/bing.png" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Bing campaign</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark border-success mr-1"></span>
                                            15:00 - 16:00
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">Metrics</span></td>
                            <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 5.78%</span></td>
                            <td><h6 class="font-weight-semibold mb-0">$970</h6></td>
                            <td><span class="badge bg-success-400">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Amazon ads</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark border-danger mr-1"></span>
                                            18:00 - 19:00
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">Blueish</span></td>
                            <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 6.79%</span></td>
                            <td><h6 class="font-weight-semibold mb-0">$1,540</h6></td>
                            <td><span class="badge bg-blue">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/brands/dribbble.png" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold">Dribbble ads</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark border-blue mr-1"></span>
                                            20:00 - 21:00
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted">Teamable</span></td>
                            <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> 9.83%</span></td>
                            <td><h6 class="font-weight-semibold mb-0">$8,350</h6></td>
                            <td><span class="badge bg-danger">Closed</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /marketing campaigns -->



        </div>

        <div class="col-xl-4">

            <!-- Daily sales -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Daily sales stats</h6>
                    <div class="header-elements">
                        <span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
                        <div class="list-icons ml-3">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                    <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                    <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart" id="sales-heatmap"></div>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-100">Application</th>
                            <th>Time</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Sigma application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">06:28 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$49.90</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-1"></i> Renewal</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">04:52 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$90.50</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-1"></i> Renewal</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">04:52 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$90.50</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-indigo-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Delta application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-lifebuoy font-size-sm mr-1"></i> Support</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">01:26 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$60.00</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-success-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Omega application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-lifebuoy font-size-sm mr-1"></i> Support</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">11:46 am</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$55.00</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-2"></i> Renewal</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">10:29 am</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$90.50</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Sigma application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">06:28 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$49.90</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm">
                                            <span class="letter-icon"></span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-1"></i> Renewal</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">04:52 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$90.50</h6>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /daily sales -->


        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->
@endsection
