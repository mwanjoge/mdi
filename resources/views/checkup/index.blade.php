@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                @include('partials._back_btn')
                {{--@include('partials._checkup_modal')--}}
                {{--<div class="card">
                    <div class="card-header">
                        Summary
                    </div>
                    <div class="card-body">
                        --}}{{--<h6>
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
                        @endif--}}{{--
                    </div>
                </div>--}}
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
        <div class="row mt-2">
            <div class="col-md-8">
                <p>All Checkups</p>
                <hr>
                <div class="btn-group float-end" role="group" aria-label="Basic example">
                    {{--<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#employee-upload">
                        <i class="fa fa-upload"></i>
                        Upload
                    </button>--}}
                    {{--<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#checkups-create">
                        <i class="fa fa-plus"></i>
                        Create new
                    </button>--}}
                </div>
                <table class="table table-sm table-striped" id="myTable">
                    <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Birth</th>
                        <th>Workplace</th>
                        <th>Job</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($checkups as $checkup)
                        <tr>
                            <td>{{$checkup->employee->name}}</td>
                            <td>{{$checkup->employee->gender}}</td>
                            <td>{{$checkup->employee->birthday->format('d M Y')}}</td>
                            <td>{{$checkup->workPlace->name}}</td>
                            <td>{{$checkup->employee->jobTitle}}</td>
                            <td>{{$checkup->employee->department}}</td>
                            <td>{{$checkup->status}}</td>
                            <td class="">
                                <a title="more" class="p-1" href="{{route('checkup.show',$checkup->id)}}">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <p>Billing Information</p>
                <hr>
            </div>
        </div>
    </div>
@endsection
