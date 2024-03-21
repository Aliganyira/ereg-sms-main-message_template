<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="daily"></div>
        </div>
    </div>
</div>
<script>

    var daily_mails={!! json_encode($daily_mails,JSON_PRETTY_PRINT)!!};
    // console.log(daily_mails);
    var days = daily_mails.date;
    var mails = daily_mails.mails;

    Highcharts.chart('daily', {
        chart: {
            type: 'column'
        },
        // colors: [ '#2676af', '#29c517', '#d011a4'],
        title: {
            text: 'Daily Mails - Last 30days'
        },
        // subtitle: {
        //     text: 'Source: WorldClimate.com'
        // },
        xAxis: {
            categories: days,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Mails'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Packet',
            data: mails.packet

        }, {
            name: 'Parcel',
            data: mails.parcel

        }, {
            name: 'Letter',
            data: mails.letter

        }]
    });
</script>
