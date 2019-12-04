@include('partials.header')
<?php
$current_count = 0;
?>
<link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css">
<div class="container">

    <div class="card surveyFormCard" id="surveyHeading">
        <div class="container">
            <h2>Survey</h2>
        </div>
    </div>
    <div class="card surveyFormCard" id="surveyForm">
        <div id="surveyId" style="display: none" data-value="{{ $survey_session_id }}"></div>
        {{ csrf_field() }}
        <form id="mySurveyForm">
            <ul class="stepper linear">
                @foreach($questions as $key => $question)
                <?php $current_count++ ?>
                <li class="step" style="list-style-type: none">
                    <div class="step-title waves-effect">{{ $question['question'] }}</div>
                    <div class="step-content" data-question-id="{{$question['id']}}" data-question-type="{{$question['question_type']}}" data-last-question="{{ $current_count == $total_questions ? 'true' : 'false' }}">

                        <!-- Your step content goes here (like inputs or so) -->
                        @if($question['question_type'] == "MULTIPLE_OPTION")
                        @foreach($question['options'] as $option_id => $option)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="answer_{{$question['id']}}" value="{{ $option['id'] }}">{{ $option['option_text'] }}
                                <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                            </label>
                        </div>
                        <br>
                        @endforeach
                        @elseif($question['question_type'] == "SINGLE_OPTION")

                        @foreach($question['options'] as $option_id => $option)

                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" name="radio-group-{{ $question['id'] }}" id="answer_{{$question['id']}}" type="radio" value="{{ $option['id'] }}" required>{{ $option['option_text'] }}
                                <span class="circle">
                                            <span class="check"></span>
                                        </span>
                            </label>
                        </div>
                        <br>
                        @endforeach

                        @elseif($question['question_type'] == "TEXT_BOX")

                        <div class="form-group">
                            <input type="text" class="form-control" id="answer_{{$question['id']}}" aria-describedby="" required>
                        </div>
                        @endif
                        <div class="step-actions">
                            <!-- Here goes your actions buttons -->
                            @if($current_count == $total_questions)
                            <button type="submit" class="waves-effect btn-info waves-dark btn next-step" data-feedback="saveSurveyResponse">SUBMIT</button>
                            @else
                            <button class="waves-effect btn-info waves-dark btn next-step" data-feedback="saveSurveyResponse">CONTINUE</button>
                            @endif
                        </div>
                    </div>
                </li>
                @endforeach

                <li class="step" style="list-style-type: none; display: none">
                    <div class="step-title waves-effect"></div>
                    <div class="step-content">

                        <!-- Your step content goes here (like inputs or so) -->
                        <div class="form-group">
                            <input type="text" class="form-control" aria-describedby="" required>
                        </div>
                        <div class="step-actions">
                            <!-- Here goes your actions buttons -->
                            <button class="waves-effect btn-info waves-dark btn next-step" data-feedback="closeSurvey">Close</button>
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>

    <div id="thankYouMsg" class="card alert alert-success" role="alert" style="display:none;">
        <span>
            <b>Thank you for completing the survey.</b>
        </span>
    </div>

    <a href="/dashboard" id="dashboardBtn" style="display: none">
        <button class="btn btn-info" >Dashboard</button>
    </a>


</div>
@include("partials.scripts")

<script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js"></script>

<script>
    var stepper = document.querySelector('.stepper');
    var stepperInstace = new MStepper(stepper, {
        // options
        firstActive: 0, // this is the default
        validationFunction: validateStep
    });

    function validateStep(stepperForm, activeStepContent)
    {
        var question_type = $(activeStepContent).attr('data-question-type');
        var question_id = $(activeStepContent).attr('data-question-id');
        var isLastQuestion = $(activeStepContent).attr('data-last-question');
        if(question_type === "TEXT_BOX")
        {
            return $('#answer_' + question_id).val().length > 0;
        }
        else
        {
            return $('#answer_' + question_id + ':checked').length > 0;
        }


        if(isLastQuestion == true)
            console.log('last question');
    }



</script>

<script>

    function completeSurvey()
    {
        $('.surveyFormCard').slideUp("slow",function(){
            $('#thankYouMsg').slideDown("slow");
            $('#dashboardBtn').show();
        });
    }

    function saveSurveyResponse(destroyFeedback, form, activeStepContent) {

        var survey_id = $('#surveyId').attr('data-value');
        var question_id = $(activeStepContent).attr('data-question-id');
        var question_type = $(activeStepContent).attr('data-question-type');
        var answer = [];
        var token = $('input[name="_token"]').val();

        var isLastQuestion = $(activeStepContent).attr('data-last-question');

        console.log(form);
        console.log(activeStepContent);

        if(question_type === "TEXT_BOX")
        {
            answer.push($('#answer_' + question_id).val());
        }
        else
        {
            $('#answer_' + question_id + ':checked').each(function() {
                answer.push(this.value);
            });
        }

        var data = {};
        data.survey_id = survey_id;
        data.question_id = question_id;
        data.answer = answer;
        data.isLastQuestion = isLastQuestion;
        console.log(data);

        $.post("/survey/save-answer", {'survey_response': data, '_token': token}, function (response) {

            destroyFeedback(true);
            if (response.success) {
                console.log('Success');
            } else {

                console.log('Error');
            }
        }).then(function () {

            if(isLastQuestion == "true")
            {
                completeSurvey();
            }

        });
    }

    $('#mySurveyForm').submit(function(){

        //completeSurvey();
        return false;
    });

</script>
@include('partials.footer')
