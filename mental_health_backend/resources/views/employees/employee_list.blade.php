@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">
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


</script>
@include("partials.footer");
