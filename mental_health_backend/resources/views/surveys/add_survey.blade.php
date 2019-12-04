@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">

            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/survey/list">Surveys</a></li>
                    <li class="breadcrumb-item">Add Survey</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                </div>
                <div class="container-fluid">

                    <div class="form-group">
                        <label for="survey_name">Survey Name</label>
                        <input type="text" class="form-control" id="survey_name">
                    </div>
                    <div class="form-group">
                        <label for="question_category">Survey Type</label><br>
                        <select class="selectpicker" data-style="btn btn-primary btn-round" id="survey_type" title="Select Frequency">
                            <option value="DAILY">Daily</option>
                            <option value="MONTHLY">Monthly</option>
                            <option value="QUATERLY">Quaterly</option>
                            <option value="YEARLY">Yearly</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" id="saveSurveyBtn">Save</button>
            {{ csrf_field() }}
        </div>
    </div>
</div>

@include("partials.scripts");
<script>

    $('body').on('click','#saveSurveyBtn', function () {

        var token = $('input[name="_token"]').val();
        var survey_data = {};

        survey_data.name = $('#survey_name').val();
        survey_data.type = $('#survey_type').val();


        if(survey_data.name == "" || survey_data.name == undefined)
        {
            Swal.fire({
                type: 'error',
                title: 'Survey name cannot be empty',
                showConfirmButton: true,
            });
            return false;
        }

        if(survey_data.type == "" || survey_data.type == undefined)
        {
            Swal.fire({
                type: 'error',
                title: 'Survey Type cannot be empty',
                showConfirmButton: true,
            });
            return false;
        }

        $.post("/survey/create", {'survey_data': survey_data, '_token': token}, function (response) {

            if (response.status) {

                Swal.fire({
                    type: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });

                window.location.href = "/survey/list";

            } else {

                Swal.fire({
                    type: 'error',
                    title: response.message,
                    showConfirmButton: true,
                });

            }
        });

    });

</script>
@include("partials.footer");
