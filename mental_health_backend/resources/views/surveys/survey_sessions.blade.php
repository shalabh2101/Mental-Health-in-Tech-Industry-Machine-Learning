@include('partials.header')

<body class="">
<div class="wrapper ">

    @include("partials.sidenav")
    <div class="main-panel">

        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Survey Sessions</h2>
                </div>

                <div class="container-fluid">

                    <table class="table">
                        <thead>
                        <tr style="font-weight: bold">
                            <th class="text-center">Survey Id</th>
{{--                            <th>Name</th>--}}
                            <th>Treatment Required</th>
{{--                            <th class="text-right">Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($survey_sessions as $key => $survey)
                        <tr>
                            <td class="text-center">{{ $survey['id'] }}</td>
{{--                            <td>{{ $survey['survey_name'] }}</td>--}}
                            <td>{{ $survey['treatment_required'] }}</td>
                            <td class="td-actions text-right">
{{--                                @if($survey['is_published'] == 0)--}}
{{--                                <a href="/survey/edit/{{$survey['id']}}">--}}
{{--                                    <button  type="button" rel="tooltip" class="btn btn-success survey_edit form-check-inline" data-toggle="tooltip" title="Edit" id="{{ $survey['id'] }}">--}}
{{--                                        <i class="material-icons">edit</i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                <button type="button" rel="tooltip" class="btn btn-success form-check-inline publish_btn" data-toggle="tooltip" title="Publish" id="{{ $survey['id'] }}" data-id="{{$survey['id']}}" data-publish-state="1">--}}
{{--                                    <i class="material-icons">done</i>--}}
{{--                                </button>--}}
{{--                                @else--}}
{{--                                <button type="button" rel="tooltip" class="btn btn-danger form-check-inline publish_btn" data-toggle="tooltip" title="UnPublish" id="{{ $survey['id'] }}" data-id="{{$survey['id']}}" data-publish-state="0">--}}
{{--                                    <i class="material-icons">close</i>--}}
{{--                                </button>--}}
{{--                                @endif--}}

                                {{ csrf_field() }}
{{--                                <a href="/survey/view/{{$survey['id']}}">--}}
{{--                                    <button type="button" rel="tooltip" class="btn btn-info survey_view form-check-inline" data-toggle="tooltip" title="View" id="{{ $survey['id'] }}">--}}
{{--                                        <i class="material-icons">remove_red_eye</i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $survey_sessions->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@include("partials.scripts");
<script>
</script>
@include("partials.footer");
