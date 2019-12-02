@include('partials.header')

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

            <div class="row">
                <div class="card col-md-4">
                    <div class="card-header">
                    </div>
                    <div class="container-fluid">
                        ada
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="card-header">
                    </div>
                    <div class="container-fluid">
                        ada
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="card-header">
                    </div>
                    <div class="container-fluid">
                        afsf
                    </div>
                </div>
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

@include("partials.footer");
