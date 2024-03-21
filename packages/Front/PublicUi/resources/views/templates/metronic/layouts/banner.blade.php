@if($segmentOne=='')

    <!--=====================================
            BANNER PART START
=======================================-->
    <section class="banner-part">
        <div class="container">
            <div class="banner-content">
                <h1><span
                        style="font-weight: bolder; font-size: larger; background: linear-gradient(to right, #ce1279 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Welcome to Mabunu Dance Festival</span>
                    <br/> #Register Leader, <br/>#Pay Registration Fee,<br/> #Added Your Group Members.</h1>
                <p>Register your Team Members and get ready to Win Various Prizes.</p>
                <a href="{{route('join')}}" class="btn btn-outline">
                    <i class="fas fa-pen"></i>
                    <span>Register your Group from here</span>
                </a>
            </div>
        </div>
    </section>
    <!--=====================================
                BANNER PART END
    =======================================-->
@elseif($segmentOne=='registrations')



    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner dashboard-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{humanize($segmentTwo)}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{humanize($segmentTwo)}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->


@else

    <!--=====================================
          SINGLE BANNER PART START
=======================================-->
    <section class="inner-section single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>{{humanize($segmentTwo)}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{humanize($segmentTwo)}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->

@endif
