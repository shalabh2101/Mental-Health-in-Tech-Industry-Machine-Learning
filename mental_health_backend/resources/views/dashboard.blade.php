@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">account_circle</i>
                                </div>
                                <p class="card-category">Total Employees</p>
                                <h3 class="card-title">{{ $employee_count }}
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    {{--                                    <i class="material-icons text-danger">warning</i>--}}
                                    {{--                                    <a href="#pablo">Get More Space...</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                        <div class="card card-stats">--}}
{{--                            <div class="card-header card-header-success card-header-icon">--}}
{{--                                <div class="card-icon">--}}
{{--                                    <i class="material-icons">check_circle</i>--}}
{{--                                </div>--}}
{{--                                <p class="card-category">Completed Donations</p>--}}
{{--                                <h3 class="card-title"></h3>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer">--}}
{{--                                <div class="stats">--}}
{{--                                    --}}{{--                                    <i class="material-icons">date_range</i> Last 24 Hours--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                        <div class="card card-stats">--}}
{{--                            <div class="card-header card-header-danger card-header-icon">--}}
{{--                                <div class="card-icon">--}}
{{--                                    <i class="material-icons">info_outline</i>--}}
{{--                                </div>--}}
{{--                                <p class="card-category">Cancelled Appointments</p>--}}
{{--                                <h3 class="card-title"></h3>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer">--}}
{{--                                <div class="stats">--}}
{{--                                    --}}{{--                                    <i class="material-icons">local_offer</i> Tracked from Github--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    {{--                    <div class="col-lg-3 col-md-6 col-sm-6">--}}
                    {{--                        <div class="card card-stats">--}}
                    {{--                            <div class="card-header card-header-info card-header-icon">--}}
                    {{--                                <div class="card-icon">--}}
                    {{--                                    <i class="fa fa-twitter"></i>--}}
                    {{--                                </div>--}}
                    {{--                                <p class="card-category">Followers</p>--}}
                    {{--                                <h3 class="card-title">+245</h3>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-footer">--}}
                    {{--                                <div class="stats">--}}
                    {{--                                    <i class="material-icons">update</i> Just Updated--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                <div class="row">
{{--                    <div class="col-md-4">--}}
{{--                        <div class="card card-chart">--}}
{{--                            <div class="card-header card-header-success">--}}
{{--                                <div class="ct-chart" id="dailySalesChart"></div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <h4 class="card-title">Blood Group Requests By Day</h4>--}}
{{--                                <p class="card-category">--}}
{{--                                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in requests today.</p>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer">--}}
{{--                                <div class="stats">--}}
{{--                                    <i class="material-icons">access_time</i> updated 4 minutes ago--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-4">--}}
{{--                        <div class="card card-chart">--}}
{{--                            <div class="card-header card-header-success">--}}
{{--                                <div class="ct-chart" id="myLineChart"></div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <h4 class="card-title">Days</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer">--}}
{{--                                <div class="stats">--}}
{{--                                    <i class="material-icons">access_time</i> updated 4 minutes ago--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-4">--}}
{{--                        <div class="card card-chart">--}}
{{--                            <div class="card-header card-header-success">--}}
{{--                                <canvas class="ct-chart" id="myChartJsChart"></canvas>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <h4 class="card-title">Days</h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-footer">--}}
{{--                                <div class="stats">--}}
{{--                                    <i class="material-icons">access_time</i> updated 4 minutes ago--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <canvas id="myChartJsChart" width="400" height="400"></canvas>--}}


                    {{--                    <div class="col-md-4">--}}
                    {{--                        <div class="card card-chart">--}}
                    {{--                            <div class="card-header card-header-warning">--}}
                    {{--                                <div class="ct-chart" id="websiteViewsChart"></div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-body">--}}
                    {{--                                <h4 class="card-title">Email Subscriptions</h4>--}}
                    {{--                                <p class="card-category">Last Campaign Performance</p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-footer">--}}
                    {{--                                <div class="stats">--}}
                    {{--                                    <i class="material-icons">access_time</i> campaign sent 2 days ago--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4">--}}
                    {{--                        <div class="card card-chart">--}}
                    {{--                            <div class="card-header card-header-danger">--}}
                    {{--                                <div class="ct-chart" id="completedTasksChart"></div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-body">--}}
                    {{--                                <h4 class="card-title">Completed Tasks</h4>--}}
                    {{--                                <p class="card-category">Last Campaign Performance</p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-footer">--}}
                    {{--                                <div class="stats">--}}
                    {{--                                    <i class="material-icons">access_time</i> campaign sent 2 days ago--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>
    </div>

    @include("partials.scripts");
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });


        //Sample Chart
        new Chartist.Line('#myLineChart', {
            labels: ['M', 'T', 'W', 'T', 'F'],
            series: [
                [12, 9, 7, 8, 5],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 20
            }
        });


        //ChartJS sample chart
        // var myCtx = document.getElementById('myChartJsChart');
        var myChart = new Chart($('#myChartJsChart'), {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    @include("partials.footer")
