@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                <div class="btn-group" role="group" aria-label="Basic example">
                    @include('partials._back_btn')
                    <a class="btn btn-primary mb-1" onclick="printCont('printr')">
                        <i class="fa fa-print"></i>
                        Print
                    </a>
                </div>
                <div class="card">
                    <div class="card-body" id="printr">
                        <table class="table">
                            <tr>
                                <td>
                                    <img src="{{asset('img/logo.png')}}" style="height: 75px;">
                                </td>
                                <td class="text-center">
                                    <h5>
                                        THE UNITED REPUBLIC OF TANZANIA
                                    </h5>
                                    <h6>
                                        PRIME MINISTER’S OFFICE<br>
                                        LABOUR, YOUTH, EMPLOYMENT AND DISABLED<br>
                                        OCCUPATIONAL SAFETY AND HEALTH AUTHORITY<br>
                                    </h6>
                                </td>
                                <td class="text-end">
                                    <img src="{{asset('img/nembo.jpg')}}" style="height: 80px; width: 90px">
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center" COLSPAN="2">
                                            MEDICAL EXAMINATION RESULTS FORM
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>WORK PLACE</th>
                                        <td>{{$workplace->workplace->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>TYPE OF EXAM</th>
                                        <td class="text-uppercase">{{$workplace->type}}</td>
                                    </tr>
                                    <tr>
                                        <th>SUBMITTED BY</th>
                                        <td>DR S.J NYUMBA</td>
                                    </tr>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-info">
                                            <th>S/NO.</th>
                                            <th>NAME OF EMPLOYEE</th>
                                            <th>SEX</th>
                                            <th>YOB</th>
                                            <th>DEPARTMENT</th>
                                            <th>JOB TITLE</th>
                                            <th>FITNESS STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $report)
                                            <tr class="text-uppercase">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$report->employee->name}}</td>
                                                <td>{{$report->employee->gender}}</td>
                                                <td>{{$report->employee->birthday->format('d M Y')}}</td>
                                                <td>{{$report->employee->department}}</td>
                                                <td>{{$report->employee->jobTitle}}</td>
                                                <td>{{$report->status}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="">
                                    <p>PREPARED BY</p>
                                    <p>............................</p>
                                    <p>DR S.J NYUMBA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function printCont(el) {
            var rePage = document.body.innerHTML;
            var printCont = document.getElementById(el).innerHTML;
            document.body.innerHTML = printCont;
            window.print();
            document.body.innerHTML = rePage;
            window.close();

            $(document).ready(function () {
                $('#s-loader').click(function () {
                    $('#loader').show();
                });
            });

        }
    </script>
@endsection
