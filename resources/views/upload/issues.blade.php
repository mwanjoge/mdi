@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                <div class="btn-group float-end" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employee-create">
                        <i class="fa fa-check"></i>
                        Mark As Seen
                    </button>
                </div>

                <div class="card">
                    <div class="card-header">
                        Employee who are checked before
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Checked Place</th>
                                    <th>Checked Date</th>
                                    <th>Fitness Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($issues as $issue)
                                    <tr>
                                        <td>{{$issue->checkup->employee->name}}</td>
                                        <td>{{$issue->checkup->workPlace->name}}</td>
                                        <td>{{$issue->checkup->checkupDate->format('d M Y')}}</td>
                                        <td>{{$issue->checkup->status}}</td>
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
