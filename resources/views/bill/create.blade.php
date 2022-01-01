@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                @include('partials._back_btn')
                <div class="card">
                    <div class="card-header">
                        Bills Create
                        <span class="float-end">
                            <a href="{{route('bill.create')}}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i>
                            </a>
                        </span>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group">
                                            <label>Workshop</label>
                                            <select name="work_place_id" class="form-controll">
                                                @foreach ($workplaces as $workplace)
                                                    <option value="{{$workplace->id}}">{{$workplace->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" name="amount" class="form-controll" min="0">
                                        </div>
                                        <input type="submit" value="save" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
