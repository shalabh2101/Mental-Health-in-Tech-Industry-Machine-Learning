@include('partials.header')
{{--<link rel="stylesheet" href="/css/glider.min.css">--}}
<link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">
        <div class="content container">

            <div class="row">
                <div class="card col-md-12">
                    <div class="card-header">
                        <h2>{{ $employee->name }}</h2>
                    </div>
                    <div class="container-fluid">
                        <h4>Hobbies & Interests</h4>
                        <div class="col-md-12" id="employee_interests">
                            <ul class="columns" data-columns="2">
                                @foreach($employee_interests as $interest)
                                    <li>{{ $interest }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="glider-contain">--}}
                <div class="row recommendation container">
                    <div class="card col-md-4">
                            C1
                    </div>
                    <div class="card col-md-4">
                            C2
                    </div>
                    <div class="card col-md-4">
                            C3
                    </div>
                    <div class="card col-md-4">
                        C4
                    </div>
                    <div class="card col-md-4">
                        C5
                    </div>
                    <div class="card col-md-4">
                        C6
                    </div>
                </div>
{{--                <button role="button" aria-label="Previous" class="glider-prev">«</button>--}}
{{--                <button role="button" aria-label="Next" class="glider-next">»</button>--}}
{{--                <div role="tablist" class="dots"></div>--}}
{{--            </div>--}}


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card col-md-4">
                            C1
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card col-md-4">
                            C2
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card col-md-4">
                            C3
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</div>
<style>
    div#employee_interests {
        -webkit-column-count: 5; /* Chrome, Safari, Opera */
        -moz-column-count: 5; /* Firefox */
        column-count: 5;
    }
</style>

@include("partials.scripts");

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
{{--<script src="/js/glider.min.js"></script>--}}
{{--<script>--}}
{{--        new Glider(document.querySelector('.glider'), {--}}
{{--        slidesToShow: 5,--}}
{{--        slidesToScroll: 5,--}}
{{--        draggable: true,--}}
{{--        dots: '.dots',--}}
{{--        arrows: {--}}
{{--        prev: '.glider-prev',--}}
{{--        next: '.glider-next'--}}
{{--        }--}}
{{--        });--}}
{{--</script>--}}
<script>
    $(document).ready(function(){
    $('.recommendation').slick({
        // dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        adaptiveHeight: true
    })});
</script>
@include("partials.footer");
