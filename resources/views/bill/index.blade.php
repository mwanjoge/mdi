@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                @include('partials._back_btn')
                <div class="card">
                    <div class="card-header">
                        Bills
                        <span class="float-end">
                            <a href="{{route('bill.create')}}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i>
                            </a>
                        </span>
                    </div>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Work Shop</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Full Paid At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bills as $bill)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$bill->billable_date}}</td>
                                    <td>{{$bill->workPlace->name}}</td>
                                    <td>{{number_format($bill->amount)}}</td>
                                    <td>{{number_format($bill->amountPaid)}}</td>
                                    <td>{{$bill->balance}}</td>
                                    <td>{{$bill->paid_date}}</td>
                                    <td></td>
                                </tr>
                            @empty
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        No Billing Infomation Yet.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
