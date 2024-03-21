<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-purple has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{number_format(@$users)}}</h3>
                    <span class="text-uppercase font-size-xs">Users</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users4 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-pink has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{number_format(@$mails)}}</h3>
                    <span class="text-uppercase font-size-xs">Mails</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-enter6 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    @php
        $color=['warning','info','slate','teal','danger'];
        $no=0;
    @endphp
    @foreach($transactionStatus as $ke=>$s)
        @php
            $c=$color[$no];
            $no++ @endphp

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-{{$c}} has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{number_format(@$s)}}</h3>
                        <span class="text-uppercase font-size-xs">{{humanize($ke)}}</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-mail-read icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-indigo has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-mailbox icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{number_format(@$todayMails)}}</h3>
                    <span class="text-uppercase font-size-xs">Today Mails</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /simple statistics -->
