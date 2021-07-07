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
                    <div class="card-body" id="printr" style="font-size: 18px;">
                        <div class="text-center">
                            <img src="{{asset('img/nembo.jpg')}}" style="height: 80px; width: 90px">
                            </h6>
                        </div>
                        <div class="">
                            Telegrams:“KAZIAJIRA”<br>
                            Occupational Safety and Health  Authority (OSHA),<br>
                            Tel: +255- (0)22 -2760548/2760552<br>
                            Fax No: (022) 2760552<br>
                            P.O Box 519,<br>
                            DAR ES SALAAM.<br>
                            Email:info@osha.go.tz<br><br>

                            In reply please quote:<br><br>

                            <strong>
                                Ref: No.MRG/NGU/33<br>
                                Date: 14THJUNE, 2021<br>
                                MANAGING DIRECTOR<br>
                                ALLIANCE ONE TOBACCO (T) LTD<br>
                                P.O BOX 1595<br>
                                MOROGORO.<br>
                            </strong>
                        </div>
                        <div class="text-center">
                            <strong>
                                RE: ADMINISTRATION OF OCCUPATIONAL HEALTH AND SAFETY ACT NO5 OF 2003 <br>
                                Section 24: Occupational Medical Examination Report.
                            </strong>
                        </div>
                        <div class="">
                            Reference is made to the above captioned subject.
                            Our medical inspectors conducted fitness to work medical examination to the workers at your workplace onJune 2021.

                            Attached hereunder is a summary report for the statutory fitness to work
                            Pre -employment medical examinations conducted on the site.

                            You are therefore required to take note and implement all recommendations raised by our medical inspectors for continued
                            compliance to OHS regulation, for the health and welfare of your workers and hence increased productivity.<br><br>

                            We thank you for your continued co-operation<br><br>


                            Mr Jerome Materu
                            For: CHIEF INSPECTOR
                        </div>

                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10" style="border: solid 5px black;">
                                <div class="text-center">
                                    <img class="" src="{{asset('img/logo.png')}}" style="height: 75px;"><br>
                                    <h3>
                                        <strong>
                                            OCCUPATIONAL SAFETY AND HEALTH AUTHORITY (OSHA)<br>

                                            FITNESS TO WORK MEDICAL EXAMINATION REPORT<br><br>
                                            WORKPLACE NAME: {{$workplace->workPlace->name}}<br>
                                            REGISTRATION NUMBER: MOR/0029<br>
                                            TOTAL NUMBER OF EMPLOYEES EXAMINED: 396<br>

                                            PHYSICAL ADDRESS: KINGOLWIRA - MOROGORO<br>
                                        </strong>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
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
