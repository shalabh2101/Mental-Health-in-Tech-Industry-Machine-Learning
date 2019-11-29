@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Survey Questions</h2>
                </div>

                <div class="container-fluid">

                    <table class="table table-responsive table-hover table-responsive-md ps-scrollbar-x">
                        <thead>
                        <tr style="font-weight: bold">
                            <th class="text-center">Question Id</th>
                            <th>Question</th>
                            <th>Question Category</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($question_list as  $question)

                            <tr>
                                <td class="text-center">{{ $question->id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->question_category }}</td>
                                <td class="td-actions">
                                        <a href="/survey/question/{{$question->id}}/edit" style="display: inline">
                                            <button  type="button" rel="tooltip" class="btn btn-success survey_edit" id="{{ $question->id }}">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </a>
                                        <a href="/survey/question/{{$question->id}}/edit" style="display: inline">
                                            <button type="button" rel="tooltip" class="btn btn-success survey_view" id="{{ $question->id }}">
                                                <i class="material-icons">remove_red_eye</i>
                                            </button>
                                        </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $question_list->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@include("partials.scripts");

<script>

    // $('.appointment_edit').click(function(){
    //
    //     var id = $(this).attr('id');
    //     alert("Edit clicked" + id);
    // });
    //
    // $('.appointment_view').click(function(){
    //
    //     var id = $(this).attr('id');
    //     alert("Edit clicked" + id);
    // });

</script>
@include("partials.footer");
