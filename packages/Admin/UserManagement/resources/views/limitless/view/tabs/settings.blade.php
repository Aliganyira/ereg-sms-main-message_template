

<!-- profile details -->
<div class="row">
    <div class="col-lg-12">
        <div class="card border-left-3 border-left-success rounded-left-0">
            <div class="card-body">
                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                    <div>
                        <h6 class="font-weight-semibold">{{$user->first_name.' '.$user->last_name}}</h6>
                        <ul class="list list-unstyled mb-0">
                            <li>Username #: &nbsp;<span class="font-weight-semibold">{{$user->email}}</span></li>
                            <li>Email: <span class="font-weight-semibold">{{$user->email}}</span></li>
                        </ul>
                    </div>

                    <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                        <h6 class="font-weight-semibold">° </h6>
                        <ul class="list list-unstyled mb-0">
                            <li>Since: <span class="font-weight-semibold">{{date('M-d Y',strtotime($user->created_at))}}</span></li>
                            <li class="dropdown">
                                Status: &nbsp;
                                <a href="#" class="badge bg-success-400 align-top dropdown-toggle"
                                   data-toggle="dropdown">Active</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-alert"></i> Overdue</a>
                                    <a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
                                    <a href="#" class="dropdown-item active"><i
                                            class="icon-checkmark3"></i> Paid</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i
                                            class="icon-spinner2 spinner"></i> On hold</a>
                                    <a href="#" class="dropdown-item"><i class="icon-cross2"></i>
                                        Canceled</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                                <span>
                                                    <span class="badge badge-mark border-success mr-2"></span>
                                                    Date:
                                                    <span class="font-weight-semibold">{{date('M,d Y')}}</span>
                                                </span>

                <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                    <li class="list-inline-item">
                        <a href="#" class="text-default"><i class="icon-eye8"></i></a>
                    </li>
                    <li class="list-inline-item dropdown">
                        <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-menu7"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print invoice</a>
                            <a href="#" class="dropdown-item"><i class="icon-file-download"></i>
                                Download invoice</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit
                                invoice</a>
                            <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove invoice</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /profile -->

<!-- Messages -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Conversation with James</h6>
        <div class="header-elements">
            <div class="list-icons ml-3">
                <div class="list-icons-item dropdown">
                    <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-arrow-down12"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
                        <a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
                        <a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
                        <a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">

        <ul class="media-list media-chat media-chat-scrollable mb-3">
            <li class="media content-divider justify-content-center text-muted mx-0">Today</li>

            <li class="media media-chat-item-reverse">

            </li>

            <li class="media">

            </li>

            <li class="media media-chat-item-reverse">

            </li>

            <li class="media">

            </li>

            <li class="media media-chat-item-reverse">

            </li>
        </ul>
        <textarea name="enter-message" class="form-control mb-3" rows="3" cols="1"
                  placeholder="Enter your message..."></textarea>
        <div class="d-flex align-items-center">
            <div class="list-icons list-icons-extended">
                <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body"
                   title="Send photo"><i class="icon-file-picture"></i></a>
                <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body"
                   title="Send video"><i class="icon-file-video"></i></a>
                <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body"
                   title="Send file"><i class="icon-file-plus"></i></a>
            </div>

            <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto"><b><i
                        class="icon-paperplane"></i></b> Send
            </button>
        </div>
    </div>
</div>
<!-- /messages -->

<!-- Sales stats -->
<div class="card">
    <div class="card-header header-elements-sm-inline">
        <h6 class="card-title">Weekly statistics</h6>
        <div class="header-elements">
            <span><i class="icon-history mr-2 text-success"></i> Updated 3 hours ago</span>

            <div class="list-icons ml-3">
                <a class="list-icons-item" data-action="reload"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="chart-container">
            <div class="chart has-fixed-height" id="weekly_statistics"></div>
        </div>
    </div>
</div>
<!-- /sales stats -->


