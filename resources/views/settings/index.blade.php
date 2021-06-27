@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.menu')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Diseases
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Disease</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diseases as $disease)
                                <tr>
                                    <td>{{$disease->category}}</td>
                                    <td>{{$disease->name}}</td>
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
