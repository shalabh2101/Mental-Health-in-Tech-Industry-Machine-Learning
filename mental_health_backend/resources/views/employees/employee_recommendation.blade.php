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
                    <div class="card-header card-header-info">
                        <h2>{{ $employee->name }}</h2>
                    </div>

                    <div class="card-body container-fluid">
                        <div class="row" style="padding-bottom: 20px">

                            @if(!empty($employee_data['hobbiesinterest']))
                                <div class="col-md-4">
                                <h4><i class="material-icons">palette</i>Hobbies</h4>
                                    <ul style="text-decoration: none; list-style-type: none">
                                    @foreach($employee_data['hobbiesinterest'] as $key =>  $interest)
                                        <li>{{ $interest }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(!empty($employee_data['moviesmusic']))
                                <div class="col-md-4">
                                    <h4><i class="material-icons">library_music</i>Movies/ Music</h4>
                                    <ul style="text-decoration: none; list-style-type: none">
                                    @foreach($employee_data['moviesmusic'] as $key =>  $music)
                                        <li>{{ $music }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(!empty($employee_data['traits']))
                                <div class="col-md-4">
                                    <h4><i class="material-icons">photo_filter</i>Traits</h4>
                                    <ul style="text-decoration: none; list-style-type: none">
                                    @foreach($employee_data['traits'] as $key => $trait)
                                        <li>{{ $trait }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="row recommendation container">
                @foreach($recommendation_data as $id => $emp_data)
                <div class="card col-md-4" style="padding-left:30px; padding-right:30px; padding-bottom: 30px">
                    <div class="card-header {{$emp_data['class']}}">
                        <h4>{{ $emp_data['name'] }}</h4>
                    </div>
                    @if(!empty($emp_data['hobbiesinterest']))
                            <h4 style="padding-top: 20px"><i class="material-icons">palette</i>Hobbies</h4>
                            <ul style="text-decoration: none; list-style-type: none">
                            @foreach($emp_data['hobbiesinterest'] as $key =>  $interest)
                                <li>{{ $interest }}</li>
                            @endforeach
                            </ul>
                    @endif

                    @if(!empty($emp_data['moviesmusic']))
                            <h4 style="padding-top: 20px"><i class="material-icons">library_music</i>Movies/ Music</h4>
                            <ul style="text-decoration: none; list-style-type: none">
                            @foreach($emp_data['moviesmusic'] as $key =>  $music)
                                <li>{{ $music }}</li>
                            @endforeach
                            </ul>
                    @endif

                    @if(!empty($emp_data['traits']))
                            <h4 style="padding-top: 20px"><i class="material-icons">photo_filter</i>Traits</h4>
                            <ul style="text-decoration: none; list-style-type: none">
                                @foreach($emp_data['traits'] as $key => $trait)
                                    <li>{{ $trait }}</li>
                                @endforeach
                            </ul>
                    @endif
                </div>
                @endforeach
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

{{--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>--}}
{{--<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>--}}
{{--<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>--}}
{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--    $('.recommendation').slick({--}}
{{--        // dots: true,--}}
{{--        infinite: true,--}}
{{--        speed: 300,--}}
{{--        slidesToShow: 3,--}}
{{--        adaptiveHeight: true--}}
{{--    })});--}}
{{--</script>--}}
@include("partials.footer");
