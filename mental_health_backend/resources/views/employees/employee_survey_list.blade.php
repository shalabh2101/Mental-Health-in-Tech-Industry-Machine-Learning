@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Available Surveys (Employee Demo)</h2>
                </div>

                <div class="container-fluid">

                    <table class="table">
                        <thead>
                        <tr style="font-weight: bold">
{{--                            <th class="text-center">Id</th>--}}
                            <th style="font-weight: bold">Name</th>
                            <th style="font-weight: bold">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($survey_list as $key => $survey)

                        <tr>
{{--                            <td class="text-center">{{ $survey['id']}}</td>--}}
                            <td>{{ $survey['survey_name'] }}</td>
                            <td>
                                <a href="/survey/{{ $survey['id']}}/employee/{{ $employee_id }}">
                                    <button type="button" rel="tooltip" class="btn btn-info form-check-inline" data-toggle="tooltip" title="Take Survey">
                                        <i class="material-icons">assignment</i>
                                    </button>
                                </a>
                            </td>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@include("partials.scripts");
<script>


</script>
@include("partials.footer");
