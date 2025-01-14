{{--@extends('ui::templates.dashlite.layouts.admin.layout')--}}
@extends('ui::templates.dashlite.layouts.main.layout')
@section('content-wrapper')

    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-lg">
            <div class="nk-block-head-sub"><span>Order History</span></div>
            <div class="nk-block-between-md g-4">
                <div class="nk-block-head-content">
                    <h2 class="nk-block-title fw-normal">Invoices</h2>
                    <div class="nk-block-des">
                        <p>You can find all of your order</p>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <ul class="nk-block-tools gx-3">
                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span><span class="d-none d-sm-inline-block">Get</span> Statement</span></a></li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <table class="table table-orders">
                    <thead class="tb-odr-head">
                    <tr class="tb-odr-item">
                        <th class="tb-odr-info">
                            <span class="tb-odr-id">Order ID</span>
                            <span class="tb-odr-date d-none d-md-inline-block">Date</span>
                        </th>
                        <th class="tb-odr-amount">
                            <span class="tb-odr-total">Amount</span>
                            <span class="tb-odr-status d-none d-md-inline-block">Status</span>
                        </th>
                        <th class="tb-odr-action">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="tb-odr-body">
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#746F5K2</a></span>
                            <span class="tb-odr-date">23 Jan 2019, 10:45pm</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$2300.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-success">Complete</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#546H74W</a></span>
                            <span class="tb-odr-date">12 Jan 2020, 10:45pm</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$120.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-warning">Pending</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#87X6A44</a></span>
                            <span class="tb-odr-date">26 Dec 2019, 12:15 pm</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$560.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-success">Complete</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#986G531</a></span>
                            <span class="tb-odr-date">21 Jan 2019, 6 :12 am</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$3654.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-danger">Cancelled</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#326T4M9</a></span>
                            <span class="tb-odr-date">21 Jan 2019, 6 :12 am</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$200.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-success">Complete</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#746F5K2</a></span>
                            <span class="tb-odr-date">23 Jan 2019, 10:45pm</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$2300.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-success">Complete</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#546H74W</a></span>
                            <span class="tb-odr-date">12 Jan 2020, 10:45pm</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$120.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-warning">Pending</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    <tr class="tb-odr-item">
                        <td class="tb-odr-info">
                            <span class="tb-odr-id"><a href="html/subscription/invoice-details.html">#87X6A44</a></span>
                            <span class="tb-odr-date">26 Dec 2019, 12:15 pm</span>
                        </td>
                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">$560.00</span>
                                                            </span>
                            <span class="tb-odr-status">
                                                                <span class="badge badge-dot badge-success">Complete</span>
                                                            </span>
                        </td>
                        <td class="tb-odr-action">
                            <div class="tb-odr-btns d-none d-sm-inline">
                                <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                <a href="html/subscription/invoice-details.html" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <a href="html/subscription/invoice-details.html" class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                        </td>
                    </tr><!-- .tb-odr-item -->
                    </tbody>
                </table>
            </div> <!-- .card -->
        </div><!-- .nk-block -->
    </div>

@endsection
@section('bottom')

@endsection
