@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                @include('partials._employee_create_modal')
                @include('partials._employee_upload_modal')
                <div class="btn-group float-end" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employee-upload">
                        <i class="fa fa-upload"></i>
                        Upload
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employee-create">
                        <i class="fa fa-plus"></i>
                        Create new
                    </button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-header">{{ __('Employees') }}</div>

                    <div class="card-body">
                        {{--@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif--}}
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>Workplace</th>
                                <th>First</th>
                                <th>Middle</th>
                                <th>Last</th>
                                <th>Gender</th>
                                <th>Birth</th>
                                <th>Nationality</th>
                                <th>Entry</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Contract</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->workPlace->name}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->middle_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->gender}}</td>
                                    <td>{{$employee->birthday->format('d M Y')}}</td>
                                    <td>{{$employee->nationality}}</td>
                                    <td>{{$employee->entryDate->format('d M Y')}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->contractType}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection
