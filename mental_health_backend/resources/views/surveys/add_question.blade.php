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
                    <li class="breadcrumb-item">Add Question</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                </div>
                <div class="container-fluid">

                    <input type="text" style="display: none" value="{{$survey_id}}" id="survey_id">

                    <div class="form-group">
                        <label for="gender">Question</label>
                        <input type="text" class="form-control" id="question_text">
                    </div>
                    <div class="form-group">
                        <label for="question_category">Question Category</label><br>
                        <select class="selectpicker" data-style="btn btn-primary btn-round" id="question_category" title="Select Category">
                            <option value="MENTAL_HEALTH">Mental Health</option>
                            <option value="PERSONALITY">Personality</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="question_category">Question Type</label><br>
                        <select class="selectpicker" data-style="btn btn-primary btn-round" id="question_type" title="Select Type">
                            <option value="SINGLE_OPTION">Radio (Single Option)</option>
                            <option value="MULTIPLE_OPTION">Checkbox (Multi Option)</option>
                            <option value="TEXT_BOX">Text Box</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card" id="checkbox_options" style="display:none">

                <div class="card-header">
                    Options
                </div>

                <div class="container-fluid mt-4 mb-4 ml-2">
                    <div id="question_options">
                    </div>

                    <button id="btnAddOptions" class="btn btn-success form-check-inline">+</button>
                </div>
            </div>

            <button class="btn btn-success" id="saveQuestionBtn">Save</button>
            {{ csrf_field() }}
        </div>
    </div>
</div>

@include("partials.scripts");
<script>

    $('#checkbox_options').on('click', '#btnAddOptions',  function(){

        var question_options = $('#question_options');
        var index_id = $('#question_options div.form-group').last().attr('data-id');
        if(index_id == undefined)
            index_id = 1;
        else
            index_id = parseFloat(index_id) + 1;
        var option_input = "<div class=\"form-group option_inputs new_option\" data-id=\"" + index_id + "\">\n" +
            "<input style='width: 500px' type=\"text\" class=\"form-check-inline form-control option_text \" data-new=\"Y\" id=\"option_temp_text_" + index_id + "\" aria-describedby=\"\" required placeholder='Option text'>\n" +
            "<input style='width:500px' type=\"text\" class=\"form-check-inline form-control option_value \" data-new=\"Y\" id=\"option_temp_value_" + index_id + "\" aria-describedby=\"\" required placeholder='Option value'>\n" +
            "<button class=\"btn btn-danger form-check-inline btnRemoveOption\">X</button>\n" +
            "</div>";
        $(question_options).append(option_input);
    });

    $('#checkbox_options').on('click','.btnRemoveOption', function(){
        $(this).parent().slideUp('slow', function(){ $(this).remove()});
    });

    $('#question_type').change(function(){

        if($(this).val() == "TEXT_BOX")
        {
            $('#checkbox_options').slideUp('slow', function() { $(this).hide() });
        }
        else
        {
            $('#checkbox_options').slideDown('slow', function() { $(this).show() });
        }

    });

    $('body').on('click','#saveQuestionBtn', function () {

        var token = $('input[name="_token"]').val();
        var question_data = {};

        var survey_id = $('#survey_id').val();
        question_data.question = $('#question_text').val();
        question_data.category = $('#question_category').val();
        question_data.question_type = $('#question_type').val();
        question_data.options = [];


        if(question_data.question == "" || question_data.question == undefined)
        {
            Swal.fire({
                type: 'error',
                title: 'Question cannot be empty',
                showConfirmButton: true,
            });
            return false;
        }

        if(question_data.category == "" || question_data.category == undefined)
        {
            Swal.fire({
                type: 'error',
                title: 'Question Category cannot be empty',
                showConfirmButton: true,
            });
            return false;
        }

        if(question_data.question_type == "" || question_data.question_type == undefined)
        {
            Swal.fire({
                type: 'error',
                title: 'Question Type cannot be empty',
                showConfirmButton: true,
            });
            return false;
        }


        $('#question_options div.option_inputs').each(function(){

            var temp = {};
            var option_text = $(this).children('input.option_text');
            var option_value = $(this).children('input.option_value');
            temp.isNew = true;
            if($(option_text).attr('data-new') == 'F')
            {
                temp.id = $(option_text).attr('data-id');
                temp.isNew = false;
            }

            temp.option_text = $(option_text).val();
            temp.option_value = $(option_value).val();

            question_data.options.push(temp);
        });

        $.post("/survey/" + survey_id + "/question/add", {'question_data': question_data, '_token': token}, function (response) {

            if (response.status) {

                Swal.fire({
                    type: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });

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
