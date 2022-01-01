<table class="table table-striped mb-0">
    <tbody>
        @foreach ($workplace->workplaceCheckups as $placeCheckup)
            <tr>
                <td>
                    @include('partials._checkup_modal')
                    @include('checkup._submit_modal')
                    {{--<a href="#" class="text-black">--}}
                        <div class="{{Request::is('workplace/'.$workplace->id.'/'.$placeCheckup->id) ? 'btn btn-primary d-block' : ''}}">
                            <p class="text-black">
                                <strong class="mb-0">
                                    <span class="float-start">Date: {{$placeCheckup->checkup_at->format('d M Y')}} </span>
                                    <span class="float-end">{{$placeCheckup->type}} </span>
                                </strong><br>
                            <hr class="mb-0 mt-0" style="width: 100%">
                            </p>
                            @if (Request::is('employee*'))
                                <span class="float-start">
                                    <a href="{{route('workplace.show',[$employee->id,$placeCheckup->id])}}" style="text-decoration: none;" class="m-1">
                                        <i class="fa fa-long-arrow-alt-left"></i>
                                        Show
                                    </a>
                                </span>
                            @else
                            <span class="float-start"> {{$placeCheckup->total_employee}} employees </span>
                            <span class="float-end">{{$placeCheckup->total_checked}} checked</span>
                            <span class="float-start">
                                <a href="{{url('workplace/report/'.$placeCheckup->id)}}" style="text-decoration: none;" class="m-1" >
                                    <i class="fa fa-file-word"></i>
                                    Report
                                </a>
                                <a href="{{url('workplace/results/'.$placeCheckup->id)}}" style="text-decoration: none;" class="m-1">
                                    <i class="fa fa-chart-line"> </i>
                                    Results
                                </a>
                                <a href="{{route('workplace.show',[$workplace->id,$placeCheckup->id])}}" style="text-decoration: none;" class="m-1">
                                    <i class="fa fa-long-arrow-alt-left"></i>
                                    Show
                                </a>
                                <a href="javascript:void(0)" style="text-decoration: none;" class="m-1" data-bs-toggle="modal" data-bs-target="#checkups-attend{{$placeCheckup->id}}">
                                    <i class="fa fa-user-md"> </i>
                                    Attend
                                </a>
                                <a class="p-1" href="javascript:void(0)" data-bs-target="#submit-checkup-{{$placeCheckup->id}}" data-bs-toggle="modal" style="text-decoration: none;">
                                    <i class="fa fa-calendar-check"></i> submit
                                </a>
                            </span>

                            @endif
                        </div>
                    {{--</a>--}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
