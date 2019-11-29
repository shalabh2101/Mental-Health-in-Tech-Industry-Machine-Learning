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
                                    @if($survey['is_published'] == 0)
                                    <a href="/survey/edit/{{$survey['id']}}">
                                        <button  type="button" rel="tooltip" class="btn btn-success survey_edit form-check-inline" data-toggle="tooltip" title="Edit" id="{{ $survey['id'] }}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </a>
                                    <button type="button" rel="tooltip" class="btn btn-success form-check-inline publish_btn" data-toggle="tooltip" title="Publish" id="{{ $survey['id'] }}" data-id="{{$survey['id']}}" data-publish-state="1">
                                        <i class="material-icons">done</i>
                                    </button>
                                    @else
                                        <button type="button" rel="tooltip" class="btn btn-danger form-check-inline publish_btn" data-toggle="tooltip" title="UnPublish" id="{{ $survey['id'] }}" data-id="{{$survey['id']}}" data-publish-state="0">
                                            <i class="material-icons">close</i>
                                        </button>
                                    @endif

                                    {{ csrf_field() }}
                                    <a href="/survey/view/{{$survey['id']}}">
                                        <button type="button" rel="tooltip" class="btn btn-info survey_view form-check-inline" data-toggle="tooltip" title="View" id="{{ $survey['id'] }}">
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

    $('.publish_btn').click(function(){

        var survey_id = $(this).attr('data-id');
        var token = $('input[name="_token"]').val();

        var publish_data = {};
        publish_data.survey_id = survey_id;
        publish_data.publish = $(this).attr('data-publish-state');

        $.post("/survey/publish_update/" + survey_id, {'publish_data': publish_data, '_token': token}, function (response) {

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

            location.reload();

        });

    });


</script>
@include("partials.footer");
