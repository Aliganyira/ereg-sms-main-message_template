{{--@extends('ui::templates.dashlite.layouts.admin.layout')--}}
@extends('ui::templates.dashlite.layouts.main.layout')
@section('content-wrapper')

    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-lg">
            <div class="nk-block-head-sub"><span>My Tickets</span></div>
            <div class="nk-block-between-md g-4">
                <div class="nk-block-head-content">
                    <h2 class="nk-block-title fw-normal">Support Ticket</h2>
                    <div class="nk-block-des">
                        <p>Here are all of your support request that you already sent.</p>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <ul class="nk-block-tools g-4 flex-wrap">
                        <li class="order-md-last"><a href="#" class="btn btn-white btn-dim btn-outline-primary"><span>Submit Ticket</span></a></li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <table class="table table-tickets">
                    <thead class="tb-ticket-head">
                    <tr class="tb-ticket-title">
                        <th class="tb-ticket-id"><span>Ticket</span></th>
                        <th class="tb-ticket-desc">
                            <span>Subject</span>
                        </th>
                        <th class="tb-ticket-date tb-col-md">
                            <span>Submited</span>
                        </th>
                        <th class="tb-ticket-seen tb-col-md">
                            <span>Last Seen</span>
                        </th>
                        <th class="tb-ticket-status">
                            <span>Status</span>
                        </th>
                        <th class="tb-ticket-action"> &nbsp; </th>
                    </tr><!-- .tb-ticket-title -->
                    </thead>
                    <tbody class="tb-ticket-body">
                    <tr class="tb-ticket-item is-unread">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C506223</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">Request for approve payment</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">26 Jan 2020</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date-last"><em class="icon-avatar bg-danger-dim icon ni ni-user-fill nk-tooltip" title="Support Team"></em> 27 Jan 2020 <span class="d-none d-xl-inline">10:20am</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-success">Open</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C503095</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">Payment was rejected</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">02 Dec 2019</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>04 Dec 2019 <span class="d-none d-xl-inline">04:45pm</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-light">Close</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C502049</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">We cannot install on our server</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">02 Nov 2019</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>04 Nov 2019 <span class="d-none d-xl-inline">04:45pm</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-success">Open</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C502035</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">Support for website</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">17 Oct 2019</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date"><em class="icon-avatar bg-danger-dim icon ni ni-user-fill nk-tooltip" title="Support Team"></em>21 Oct 2019 <span class="d-none d-xl-inline">04:45pm</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-light">Close</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item is-unread">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501783</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">We cannot install on our server</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">02 Oct 2019</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>07 Feb 2020 <span class="d-none d-xl-inline">02:28pm</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-success">Open</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501624</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">Setup Local Payment Gateway</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">01 Oct 2019</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date"><em class="icon-avatar bg-warning-dim icon ni ni-user-fill nk-tooltip" title="Technical Team"></em>04 Oct 2019 <span class="d-none d-xl-inline">04:15pm</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-success">Open</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501605</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">Unable to set automated email response</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">24 Sep 2019</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>01 Oct 2019 <span class="d-none d-xl-inline">02:29am</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-light">Close</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                        <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501579</a></td>
                        <td class="tb-ticket-desc">
                            <a href="html/subscription/ticket-details.html"><span class="title">Setup Local Payment Gateway</span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                            <span class="date">17 Sep 2019</span>
                        </td>
                        <td class="tb-ticket-seen tb-col-md">
                            <span class="date"><em class="icon-avatar bg-warning-dim icon ni ni-user-fill nk-tooltip" title="Technical Team"></em>29 Sep 2019 <span class="d-none d-xl-inline">06:17am</span></span>
                        </td>
                        <td class="tb-ticket-status">
                            <span class="badge badge-light">Close</span>
                        </td>
                        <td class="tb-ticket-action">
                            <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                                <em class="icon ni ni-chevron-right"></em>
                            </a>
                        </td>
                    </tr><!-- .tb-ticket-item -->
                    </tbody>
                </table>
            </div>
        </div><!-- .nk-block -->
        <div class="nk-block nk-block-lg">
            <div class="card card-bordered border-primary">
                <div class="card-inner">
                    <div class="nk-cta">
                        <div class="nk-cta-block">
                            <div class="nk-cta-img">
                                <em class="icon icon-circle ni ni-msg"></em>
                            </div>
                            <div class="nk-cta-text">
                                <p>If you don’t find your question please contact our support team.</p>
                            </div>
                        </div>
                        <div class="nk-cta-action">
                            <a href="html/subscription/contact.html" class="btn btn-primary">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>

@endsection
@section('bottom')

@endsection
