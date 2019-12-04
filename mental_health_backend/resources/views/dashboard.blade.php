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
                    <div class="col-md-12">
                        <div class="card card-chart">
                            {{--                            <div class="card-header card-header-success">--}}
                            {{--                                <div class="ct-chart" id="dailySalesChart"></div>--}}
                            {{--                            </div>--}}
                            <div class="card-body">
                                <h4 class="card-title">Daily Stress</h4>
                                <canvas id="stressChart"></canvas>
                                {{--                                <p class="card-category">--}}
                                {{--                                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in requests today.</p>--}}
                            </div>
                            <div class="card-footer">
                                {{--                                <div class="stats">--}}
                                {{--                                    <i class="material-icons">access_time</i> updated 4 minutes ago--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-body">
                                <h4 class="card-title">People who think Mental Health would hurt Career</h4>
                                <canvas id="careerChart"></canvas>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-body">
                                <h4 class="card-title">Does your employer provide mental health benefits as part of
                                    health care coverage</h4>
                                <canvas id="benefitsChart"></canvas>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-body">
                                <h4 class="card-title">Do you think that discussing mental health disorder with your
                                    employer would have negative consequences</h4>
                                <canvas id="discussChart"></canvas>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-body">
                                <h4 class="card-title">Would you feel comfortable discussing a mental health disorder with your direct supervisor(s)</h4>
                                <canvas id="directSupChart"></canvas>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-body">
                                <h4 class="card-title">If you have been diagnosed or treated for a mental health disorder,
                                    do you ever reveal this to coworkers or employees?</h4>
                                <canvas id="revelChart"></canvas>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>


                </div>

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

    @include("partials.scripts");
    <script>
        $(document).ready(function () {
            $().ready(function () {
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

                $('.fixed-plugin a').click(function (event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function () {
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

                $('.fixed-plugin .background-color .badge').click(function () {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function () {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function () {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function () {
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

                $('.switch-sidebar-image input').change(function () {
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

                $('.switch-sidebar-mini input').change(function () {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function () {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function () {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function () {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
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

    <script>
        // Would hurt career
        var careerChart = new Chart($('#careerChart'), {
            type: 'bar',
            data: {
                labels: ['Yes, It would', 'No,it wont', 'Maybe', 'Yes, it has', 'No, it has not'],
                datasets: [{
                    data: [563, 147, 588, 105, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1,
                    barThickness: 'flex',
                    maxBarThickness: 1,
                }],
            },
            options: {
                responsive: true,
                legend: {
                    position: top
                },
                title: {
                    display: true,
                    text: "Will Mental Health affect Career"
                }
            }
        });
        $('#careerChart').parents('div.card-body').css({'padding-left': '10px'})
    </script>

    <script>
        // Daily Stress Sample
        let streesChart = document.getElementById('stressChart');

        Chart.defaults.global.defaultFontFamily = 'Lato',
            Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let moodChart = new Chart(streesChart, {
            type: 'line',
            data: {
                labels: ['1st Nov', '2nd Nov', '3rd Nov', '4th Nov', '5th Nov', '6th Nov', '7th Nov', '8th Nov', '9th Nov', '10th Nov', '11th Nov', '12th Nov',
                    '13th Nov', '14th Nov', '15th Nov', '16th Nov', '17th Nov', '18th Nov', '19th Nov', '20th Nov', '21st Nov', '22nd Nov', '23rd Nov', '24th Nov',
                    '25th Nov', '26th Nov', '27th Nov', '28th Nov', '29th Nov', '30th Nov'],

                datasets: [{
                    label: 'Daily Mood',
                    data: [
                        2.17, 0, 0, 3.92, 3, 3.83, 3.12, 2.43, 0, 0, 3.75, 3.75, 3.98, 3.38, 2.18, 0, 0, 4.04, 3, 3.92, 2.5, 1.9, 0, 0, 4.03, 3.84, 4.33, 3.14, 2.12, 0],

                    backgroundColor: ['rgba(75, 192, 192, 0.6)'],
                    borderWidth: 2,
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#000'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Daily Avg. employee stress',
                    fontSize: 18
                }
            }

        });
    </script>

    <script>

        let benefitChart = new Chart($('#benefitsChart'), {
            type: 'bar',
            data: {
                labels: ['Yes', 'I dont know', 'No'],

                datasets: [{
                    //  label:'Does your employer provide mental health benefits as part of healthcare coverage: ',
                    data: [531, 319, 213],

                    backgroundColor: ['rgba(164, 201, 255, 0.6)',
                        'rgba(76, 202, 202, 0.6)',
                        'rgba(227, 232, 85, 0.6)'],
                    borderWidth: 2,
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#000'
                }]
            },

            options: {
                legend: {
                    display: false
                },

                layout: {
                    padding: {
                        left: 40,
                        right: 300,
                        top: 50
                    }
                },
                // title:{
                //     display:true,
                //     text: 'Does your employer provide mental health benefits as part of healthcare coverage',
                //     fontSize: 22
                // },
                scales: {
                    xAxes: [{
                        barThickness: 55,
                    }]
                }
            }

        });
    </script>


    <script>

        let discussChart = new Chart($('#discussChart'), {
            type: 'bar',
            data: {
                labels: ['Yes', 'No', 'Maybe'],

                datasets: [{
                    //  label:'Does your employer provide mental health benefits as part of healthcare coverage: ',
                    data: [319, 485, 511],

                    backgroundColor: ['rgba(164, 201, 255, 0.6)',
                        'rgba(76, 202, 202, 0.6)',
                        'rgba(227, 232, 85, 0.6)'],

                    borderWidth: 2,
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#000'
                }]
            },

            options: {
                legend: {
                    display: false
                },

                layout: {
                    padding: {
                        left: 200,
                        right: 200,
                        top: 50
                    }
                },
                // title:{
                //     display:true,
                //     text: 'Does your employer provide mental health benefits as part of healthcare coverage',
                //     fontSize: 22
                // },
                scales: {
                    xAxes: [{
                        barThickness: 55,
                    }]
                }
            }

        });

    </script>

    <script>

        let directSupChart = new Chart($('#directSupChart'), {
            type: 'bar',
            data: {
                labels: ['Yes', 'Maybe', 'No'],

                datasets: [{
                    //  label:'Does your employer provide mental health benefits as part of healthcare coverage: ',
                    data: [428, 382, 336],

                    backgroundColor: ['rgba(164, 201, 255, 0.6)',
                        'rgba(76, 202, 202, 0.6)',
                        'rgba(227, 232, 85, 0.6)'],

                    borderWidth: 2,
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#000'
                }]
            },

            options: {
                legend: {
                    display: false
                },

                layout: {
                    padding: {
                        left: 200,
                        right: 200,
                        top: 50
                    }
                },
                // title:{
                //     display:true,
                //     text: 'Does your employer provide mental health benefits as part of healthcare coverage',
                //     fontSize: 22
                // },
                scales: {
                    xAxes: [{
                        barThickness: 55,
                    }]
                }
            }

        });

    </script>


    <script>

        let revelChart = new Chart($('#revelChart'), {
            type: 'bar',
            data: {
                labels: ['Not applicable to me', 'Sometimes, if it comes up', 'No, because it would impact me negatively',
                    'No, because it doesn\'t matter', 'Yes, always'],

                datasets: [{
                    //  label:'Does your employer provide mental health benefits as part of healthcare coverage: ',
                    data: [111, 99, 51, 15, 11],

                    backgroundColor: ['rgba(164, 201, 255, 0.6)',
                        'rgba(76, 202, 202, 0.6)',
                        'rgba(227, 232, 85, 0.6)',
                        'rgba(131,104,209, 0.6)',
                        'rgba(254,185,170, 0.6)'],

                    borderWidth: 2,
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#000'
                }]
            },

            options: {
                legend: {
                    display: false
                },

                layout: {
                    padding: {
                        left: 200,
                        right: 200,
                        top: 50
                    }
                },
                // title:{
                //     display:true,
                //     text: 'Does your employer provide mental health benefits as part of healthcare coverage',
                //     fontSize: 22
                // },
                scales: {
                    xAxes: [{
                        barThickness: 55,
                    }]
                }
            }

        });

    </script>

@include("partials.footer")
