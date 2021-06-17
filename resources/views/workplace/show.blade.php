@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
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
                <div class="btn-group float-end" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#employee-upload">
                        <i class="fa fa-upload"></i>
                        Upload
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#employee-create">
                        <i class="fa fa-plus"></i>
                        Create new
                    </button>
                </div>
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Birth</th>
                        <th>Nationality</th>
                        <th>Entry</th>
                        <th>Phone</th>
                        <th>Contract</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workplace->employees as $employee)
                        <tr>
                            <td>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</td>
                            <td>{{$employee->gender}}</td>
                            <td>{{$employee->birthday->format('d M Y')}}</td>
                            <td>{{$employee->nationality}}</td>
                            <td>{{$employee->entryDate->format('d M Y')}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->contractType}}</td>
                            <td class="{{$employee->isChecked ? 'bg-success':'bg-warning'}}">{{$employee->isChecked ? 'Checked':'Not Checked'}}</td>
                            <td class="">
                                @include('partials._member_checkup_modal')
                                <div class="dropup">
                                <a title="more" class="p-1" href="#"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#employee-checkups-create{{$employee->id}}">
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
            <div class="col-md-4">
                <p>Workplace Checkups</p>
                <hr>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                <p>
                                    <strong>Date
                                    <span class="float-end">Jan 1 2020</span>
                                    </strong>
                                    <hr>
                                    100 checked
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <strong>Date
                                    <span class="float-end">Jan 1 2020</span>
                                    </strong>
                                    <hr>
                                    100 checked
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
