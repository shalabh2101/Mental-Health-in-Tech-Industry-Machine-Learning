@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Surveys</h2>
                </div>

                <div class="container-fluid">

                    <table class="table">
                        <thead>
                        <tr style="font-weight: bold">
                            <th class="text-center">Survey Id</th>
                            <th>Name</th>
                            <th>Is Published</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($survey_list as $key => $survey)

                            <tr>
                                <td class="text-center">{{ $survey['id'] }}</td>
                                <td>{{ $survey['survey_name'] }}</td>
                                <td>{{ $survey['is_published'] == 1 ? 'Yes' : 'No' }}</td>
                                <td class="td-actions text-right">
                                    <a href="/survey/edit/{{$survey['id']}}">
                                        <button  type="button" rel="tooltip" class="btn btn-success survey_edit" id="{{ $survey['id'] }}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </a>
                                    <a href="/survey/view/{{$survey['id']}}">
                                        <button type="button" rel="tooltip" class="btn btn-success survey_view" id="{{ $survey['id'] }}">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </a>
                            </tr>
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
