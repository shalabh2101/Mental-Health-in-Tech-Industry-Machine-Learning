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
                    @if($viewOnly)
                        <li class="breadcrumb-item active" aria-current="page"><a href="/survey/view/{{ $survey_id }}">{{ $survey_id }}</a></li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page"><a href="/survey/edit/{{ $survey_id }}">{{ $survey_id }}</a></li>
                    @endif
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                </div>
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="appointment-id">Id</label>
                        <input type="text" class="form-control" id="question_id" aria-describedby="" data-value="{{ $question->id }}" value="{{ $question->id }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="gender">Question</label>
                        <input type="text" class="form-control" id="question_text" value="{{ $question->question }}" {{ $viewOnly == true ? 'disabled' : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="question_category">Question Category</label><br>
                        <select class="selectpicker" data-style="btn btn-primary btn-round" id="question_category" title="Select Category" {{ $viewOnly == true ? 'disabled' : '' }}>
                            <option {{ $question->question_category =="MENTAL_HEALTH" ? 'selected' : ''}} value="MENTAL_HEALTH">Mental Health</option>
                            <option {{ $question->question_category =="PERSONALITY" ? 'selected' : ''}}  value="PERSONALITY">Personality</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="question_category">Question Type</label><br>
                        <select class="selectpicker" data-style="btn btn-primary btn-round" id="question_type" title="Select Type" {{ $viewOnly == true ? 'disabled' : '' }}>
                            <option {{ $question->question_type == "SINGLE_OPTION" ? 'selected' : ''}}  value="SINGLE_OPTION">Radio (Single Option)</option>
                            <option {{ $question->question_type == "MULTIPLE_OPTION" ? 'selected' : ''}}  value="MULTIPLE_OPTION">Checkbox (Multi Option)</option>
                            <option {{ $question->question_type == "TEXT_BOX" ? 'selected' : ''}}  value="TEXT_BOX">Text Box</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card" id="checkbox_options" style="{{ $question->question_type == "TEXT_BOX" ? 'display:none' : '' }}">
                <div class="container-fluid mt-4 mb-4 ml-2">
                    <div id="question_options">
                    @foreach($question->options as $option)
                        <div class="form-group option_inputs">
                            <input style="width: 500px" type="text" class="form-check-inline form-control option_text" data-new="F" data-id="{{ $option->id }}" id="option_text_{{$option->id}}" aria-describedby="" value="{{ $option->option_text }}" required {{ $viewOnly == true ? 'disabled' : '' }}>
                            <input style="width: 500px" type="text" class="form-check-inline form-control option_value" data-new="F" data-id="{{ $option->id }}" id="option_value_{{$option->id}}" aria-describedby="" value="{{ $option->option_value }}" required {{ $viewOnly == true ? 'disabled' : '' }}>

                            @if(!$viewOnly)
                                <button class="btn btn-danger form-check-inline btnRemoveOption">X</button>
                            @endif
                        </div>
                    @endforeach
                    </div>

                    @if(!$viewOnly)
                        <button id="btnAddOptions" class="btn btn-success form-check-inline">+</button>
                    @endif
                </div>
            </div>

            @if(!$viewOnly)
                <button class="btn btn-success" id="saveQuestionBtn">Save</button>
                {{ csrf_field() }}
            @endif
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
        question_data.id = $('#question_id').attr('data-value');
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

        $.post("/survey/question/update", {'question_data': question_data, '_token': token}, function (response) {

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
