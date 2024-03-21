<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div id="pie_chart" style="height: 450px;"></div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div id="pie_chart2" style="height: 450px;"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-body border-top-teal"  style="max-height: 450px; overflow: auto; overflow-scrolling: auto;">
            <div class="list-feed" >
                @php
                    $color=['warning','pink','slate','teal','danger'];
                    @endphp
                @foreach($recentTransactions as $k=>$t)
                    <div class="list-feed-item border-{{$color[array_rand($color)]}}-400">
                        <div class="text-muted">{{convert_date($t->created_at)}}</div>
                        <a href="#" class="text-purple">{{$t->user->first_name}} {{$t->user->last_name}}</a> {{humanize($t->mail_type)}} <strong>#{{$t->reference_no}}</strong> Status : <strong class="text-{{mailStatus($t->status)->color}}">{{humanize($t->status)}}</strong> <a href="{{route('mails.show',encode_id($t->id))}}">View Mail</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



