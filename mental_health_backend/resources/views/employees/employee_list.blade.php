@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="card col-md-5">
                    <div>
                        <canvas id="fearChart"></canvas>
                    </div>
                </div>
                <div class="card col-md-5">
                    <div>
                        <canvas id="treatmentChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Employees</h2>
                </div>

                <div class="container-fluid">

                    <table class="table">
                        <thead>
                        <tr style="font-weight: bold">
                            <th class="text-center">Employee Id</th>
                            <th>Name</th>
                            <th>Recommendation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee_list as $key => $employee)

                        <tr>
                            <td class="text-center">{{ $employee['id']}}</td>
                            <td>{{ $employee['name'] }}</td>
                            <td>
                               <a href="/employees/profile/{{ $employee['id']}}">
                                    <button type="button" rel="tooltip" class="btn btn-info form-check-inline" data-toggle="tooltip" title="View Recommendation">
                                        <i class="material-icons">remove_red_eye</i>
                                    </button>
                               </a>

                                <a href="/employees/survey_list/{{ $employee['id']}}">
                                    <button type="button" rel="tooltip" class="btn btn-info form-check-inline" data-toggle="tooltip" title="Take Survey">
                                        <i class="material-icons">assignment</i>
                                    </button>
                                </a>

                            </td>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $employee_list->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@include("partials.scripts");

<script>
    let fearChart = new Chart($('#fearChart'), {
        type: 'pie',
        data: {
            labels: ['Yes', 'No'],
            datasets: [{
                 // label:'Does your employer provide mental health benefits as part of healthcare coverage: ',
                data: [{{ $fear_yes_count }}, {{ $fear_no_count }}],
                backgroundColor: ['rgba(164, 201, 255, 0.6)',
                    'rgba(76, 202, 202, 0.6)'],

                borderWidth: 2,
                hoverBorderWidth: 2,
                hoverBorderColor: '#000'
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom'
            },

            layout: {
                padding: {
                    left: 2,
                    right: 0,
                    top: 10
                }
            },
            title:{
                display:true,
                text: 'People having fear about sharing mental health issue',
                fontSize: 16
            },
            // scales: {
            //     xAxes: [{
            //         barThickness: 55,
            //     }]
            // }
        }

    });


    let treatmentChart = new Chart($('#treatmentChart'), {
        type: 'pie',
        data: {
            labels: ['Yes', 'No'],
            datasets: [{
                // label:'Does your employer provide mental health benefits as part of healthcare coverage: ',
                data: [{{ $treatment_yes_count }}, {{ $treatment_no_count }}],
                backgroundColor: [
                    'rgba(131,104,209, 0.6)',
                    'rgba(254,185,170, 0.6)'
                ],

                borderWidth: 2,
                hoverBorderWidth: 2,
                hoverBorderColor: '#000'
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom'
            },

            layout: {
                padding: {
                    left: 10,
                    right: 0,
                    top: 10
                }
            },
            title:{
                display:true,
                text: 'People who require treatment',
                fontSize: 16
            },
            // scales: {
            //     xAxes: [{
            //         barThickness: 55,
            //     }]
            // }
        }

    });


</script>

@include("partials.footer");
