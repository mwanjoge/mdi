@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.menu')
            @include('partials._workplace_create_modal')
            @include('partials._workplace_upload_modal')
            <div class="btn-group float-end" role="group" aria-label="Basic example">
                {{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#work-place-upload">
                    <i class="fa fa-upload"></i>
                    Upload
                </button>--}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#work-place-create">
                    <i class="fa fa-plus"></i>
                    Create new
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">{{ __('Workplace') }}</div>

                <div class="card-body">
                    {{--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif--}}
                    <table class="table table-sm table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($workplaces as $workplace)
                                <tr>
                                    <td>{{$workplace->name}}</td>
                                    <td>{{$workplace->location}}</td>
                                    <td>{{$workplace->address}}</td>
                                    <td>{{$workplace->status}}</td>
                                    <td>
                                        <a href="{{route('workplace.show',$workplace->id)}}">
                                            <i class="fa fa-angle-right"></i> show
                                        </a>
                                        <a href="{{route('workplace.report',$workplace->id)}}" class="p-1">
                                            <i class="fa fa-file-pdf-o"></i> report
                                        </a>
                                    </td>
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
