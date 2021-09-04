@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card text-uppercase">
                <div class="card-header">{{$employee->name.' Checkup Results'}}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Checkups
                </div>
                @include('workplace._workplace_checkups')
                {{-- <div class="card-body">
                    @include('workplace._workplace_checkups')
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
