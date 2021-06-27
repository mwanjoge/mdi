@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
            </div>
            <div class="col-md-12">
                <form>
                    @include('partials._checkup_fields')
                </form>
            </div>
        </div>
    </div>
@endsection
