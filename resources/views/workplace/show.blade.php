@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                @include('partials._back_btn')
                <div class="card">
                    <div class="card-header">
                        {{$workplace->name}}
                    </div>
                    <div class="card-body">
                        <h6>
                            {{$workplace->location}}
                            <span class="float-end">
                                {{$workplace->address}}
                            </span>
                        </h6>
                        <hr>
                        @if($workplace->status === 'Inspected')
                            <span class="badge bg-success rounded-pill p-2" style="font-size: 15px;">
                                {{$workplace->status}}
                            </span>
                        @else
                            <span class="badge bg-danger rounded-pill p-2" style="font-size: 15px;">
                                {{$workplace->status}}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row mt-2">
            <div class="col-md-12">
                <h5>Checkups</h5>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-warning rounded-pill">2</button>

                    <button type="button" class="btn btn-outline-warning btn-sm">September</button>
                </div>
            </div>
        </div>--}}
        <div class="row mt-4">
            <div class="col-md-8">
                <p>Employees Information</p>
                <hr>
                @include('partials._employee_create_modal')
                @include('partials._employee_upload_modal')
                @include('partials._workplace_checkup_modal')

                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">&ensp;</li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                          Checkups
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                          Employees
                          <span class="badge bg-primary rounded-circle">28</span>
                        </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li> --}}
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p class="text-uppercase">
                            {{$workplaceCheckup->checkup_at->format('d M Y')}}
                            <span class="float-end">
                                {{$workplaceCheckup->type}}
                            </span>
                        </p>
                        <hr>
                        <table class="table table-sm table-striped" id="myTable">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Nationality</th>
                                <th>Contract</th>
                                <th>Type</th>
                                <th>Checked At</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($workplaceCheckups as $checkup)
                                <tr>
                                    <td>{{$checkup->employee->name}}</td>
                                    <td>{{$checkup->employee->gender}}</td>
                                    <td>{{$checkup->employee->nationality}}</td>
                                    <td class="text-capitalize">{{$checkup->employee->contractType}}</td>
                                    <td>{{$checkup->type}}</td>
                                    <td>{{$checkup->checkupDate->format('d M Y')}}</td>
                                    <td class="text-uppercase {{$checkup->status === 'not checked'? 'bg-warning text-white':'bg-success text-white'}}">
                                        {{$checkup->status }}</td>
                                    <td class="">
                                        @include('partials._member_checkup_modal')
                                        <div class="dropup">
                                        <a title="more" class="p-1" href="#"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#employee-checkups-create{{$checkup->employee->id}}">
                                                    <i class="fa fa-user-md"></i> Checkup
                                                </a>
                                            </li>
                                            {{--<li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                                        </ul>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="btn-group float-end" role="group" aria-label="Basic example">
                            {{--<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#employee-upload">
                                <i class="fa fa-upload"></i>
                                Upload
                            </button>--}}
                            {{--<a class="btn btn-primary btn-sm" href="{{route('workplace.results',$workplace->id)}}">
                                <i class="fa fa-file-pdf"></i>
                                View Report
                            </a>--}}
                        </div>
                        <table class="table table-sm table-striped" id="myTable">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Birth</th>
                                <th>Nationality</th>
                                <th>Entry</th>
                                <th>Phone</th>
                                <th>Contract</th>
                                {{-- <th></th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($workplace->employees as $employee)
                                <tr>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->gender}}</td>
                                    <td>{{$employee->birthday->format('d M Y')}}</td>
                                    <td>{{$employee->nationality}}</td>
                                    <td>{{$employee->entryDate->format('d M Y')}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->contractType}}</td>
                                    {{-- <td class="">
                                        @include('partials._member_checkup_modal')
                                        <div class="dropup">
                                        {{-- <a title="more" class="p-1" href="#"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#employee-checkups-create{{$employee->id}}">
                                                    <i class="fa fa-user-md"></i> Checkup
                                                </a>
                                            </li>
                                            {{--<li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>--
                                        </ul>
                                        </div>

                                    </td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                  </div>

            </div>
            <div class="col-md-4">
                <p>Workplace Checkups
                    <span class="float-end">
                        <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#workplace-checkups-create">
                            {{-- <i class="fa fa-strethoscope"></i> --}} +
                        </a>
                    </span>
                </p>
                <hr>
                <table class="table table-striped">
                    <tbody>
                        @foreach ($workplace->workplaceCheckups as $placeCheckup)
                            <tr>
                                <td>
                                    @include('partials._checkup_modal')
                                    {{--<a href="#" class="text-black">--}}
                                        <div class="{{Request::is('workplace/'.$workplace->id.'/'.$placeCheckup->id) ? 'btn btn-primary d-block' : ''}}">
                                            <p class="text-black">
                                                <strong class="mb-0">
                                                    <span class="float-start">Date: {{$placeCheckup->checkup_at->format('d M Y')}} </span>
                                                    <span class="float-end">{{$placeCheckup->type}} </span>
                                                </strong><br>
                                            <hr class="mb-0 mt-0" style="width: 100%">
                                            <span class="float-start"> {{$placeCheckup->total_employee}} employees </span>
                                            <span class="float-end">{{$placeCheckup->total_checked}} checked</span>
                                            </p>
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
                                            </span>
                                        </div>
                                    {{--</a>--}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
