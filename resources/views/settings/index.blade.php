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
                    <h6>New Disease</h6>
                    <form action="{{route('disease.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="category" placeholder="Disease Category" class="form-control">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="name" placeholder="Disease Name" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Disease</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diseases as $disease)
                                <tr>
                                    <td>{{$disease->category}}</td>
                                    <td>{{$disease->name}}</td>
                                    <td>
                                        <a href="{{route('disease.delete',$disease->id)}}" class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="" class="">
                                            <i class="fa fa-edit"></i>
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
