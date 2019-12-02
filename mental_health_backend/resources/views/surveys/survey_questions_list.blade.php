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
{{--                    @if($viewOnly)
                        <li class="breadcrumb-item active" aria-current="page"><a href="/survey/view/{{ $survey_id }}">{{ $survey_id }}</a></li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page"><a href="/survey/edit/{{ $survey_id }}">{{ $survey_id }}</a></li>
                    @endif--}}
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Survey Questions</h2>
                </div>
                <div class="container-fluid table-responsive">

                    <table class="table table-hover ps-scrollbar-x">
                        <thead>
                        <tr>
                            <th class="text-center" style="font-weight: bold">Question Id</th>
                            <th style="font-weight: bold">Question</th>
                            <th style="font-weight: bold">Question Category</th>
                            <th style="font-weight: bold">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($question_list as  $question)

                            <tr>
                                <td class="text-center">{{ $question->id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->question_category }}</td>
                                <td class="td-actions form-check-inline">

                                        @if(!$viewOnly)
                                            <a href="/survey/question/{{$question->id}}/edit">
                                                <button  type="button" rel="tooltip" class="btn btn-success survey_edit form-check-inline mr-2" id="{{ $question->id }}" data-toggle="tooltip" title="Edit">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                        @endif
                                        <a href="/survey/question/{{$question->id}}/view">
                                            <button type="button" rel="tooltip" class="btn btn-info survey_view form-check-inline" id="{{ $question->id }}" data-toggle="tooltip" title="View">
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

</script>
@include("partials.footer");
