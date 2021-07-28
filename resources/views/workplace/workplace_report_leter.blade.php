@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.menu')
                <div class="btn-group" role="group" aria-label="Basic example">
                    @include('partials._back_btn')
                    <a class="mb-1 btn btn-primary" onclick="printCont('printr')">
                        <i class="fa fa-print"></i>
                        Print
                    </a>
                </div>
                <h5>{{$workplace->workPlace->name.' FITNESS TO WORK MEDICAL EXAMINATION REPORT'}}</h5>
                <hr>
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
                                {{$workplace->workPlace->name}}<br>
                                {{$workplace->workPlace->address}}<br>
                                {{$workplace->workPlace->location}}<br>
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
                            Our medical inspectors conducted fitness to work medical examination to the workers at your workplace on {{$workplace->checkup_at->format('d M Y')}}.

                            Attached hereunder is a summary report for the statutory fitness to work
                            {{$workplace->type}} medical examinations conducted on the site.

                            You are therefore required to take note and implement all recommendations raised by our medical inspectors for continued
                            compliance to OHS regulation, for the health and welfare of your workers and hence increased productivity.<br><br>

                            We thank you for your continued co-operation<br><br>


                            Mr Jerome Materu
                            For: CHIEF INSPECTOR
                        </div>

                        <div class="" style="border: solid 5px black;">
                            <div class="text-center">
                                <img class="" src="{{asset('img/logo.png')}}" style="height: 75px;"><br>
                                <h3>
                                    <strong>
                                        OCCUPATIONAL SAFETY AND HEALTH AUTHORITY (OSHA)<br><br>

                                        FITNESS TO WORK MEDICAL EXAMINATION REPORT<br><br><br>
                                        WORKPLACE NAME: {{$workplace->workPlace->name}}<br><br>
                                        REGISTRATION NUMBER: {{$workplace->workPlace->reg}}<br><br>
                                        TOTAL NUMBER OF EMPLOYEES EXAMINED: {{$workplace->total_checked}}<br><br>

                                        PHYSICAL ADDRESS: {{$workplace->workPlace->location}}<br><br>
                                    </strong>
                                </h3>
                            </div>
                        </div>

                        <div class="mt-2">
                            <h3 class="text-uppercase">
                                <strong>
                                    {{$workplace->type}} MEDICAL EXAMINATION REPORT<br>
                                    COMPANY NAME: {{$workplace->workPlace->name}}<br>

                                    LOCATION:{{$workplace->workPlace->location}}
                                </strong>
                            </h3>
                            <h4>
                                1. Introduction
                            </h4>
                            Occupational safety and Health Authority (OSHA) is the Government agency enacted by
                            law to oversee the implementation of OHS act no 5 of 2003 at all workplaces.
                            In carrying out its regulatory functions OSHA carries out various statutory inspections
                            including medical surveillance for the workers fitness to work. Periodic fitness to work medical
                            examinations are conducted by qualified medical doctors from OSHA and where applicable
                            by doctors who are accredited by the chief inspector.


                            <h4>2. Activity summary</h4>
                            <div class="">
                                The activity comprised of consultation, general physical examination including
                                weight and Height measurement for BMI (Body Mass Indices), Blood Pressure measurements,
                                Eudiometry, and visual acuity testing.
                            </div>
                            <h4>3. Finding</h4>
                            {{numberToWords($workplace->total_checked)}}({{$workplace->total_checked}}) workers of
                            <span class="text-capitalize">{{$workplace->workPlace->name}}</span> were examined,
                            {{$workplace->female}} women and {{$workplace->male}} men. All above 18 years, with few above 60 years.

                            <h4 class="text-center mt-2">DISTRIBUTION OF WORKERS</h4>
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th>%</th>
                                </tr>
                                <tr>
                                    <th>MALE</th>
                                    <td>{{$workplace->male}}</td>
                                    <td>
                                        @php
                                            $mp = number_format(getPercentage($workplace->male,$workplace->male+$workplace->female)).'%';
                                        @endphp
                                        <p class="alert-{{getPercentageStatusColor($mp)}} p-1 mb-0" style="width:{{$mp}}">
                                            {{$mp}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>FEMALE</th>
                                    <td>{{$workplace->female}}</td>
                                    <td>
                                        @php
                                            $fp = number_format(getPercentage($workplace->female,$workplace->male+$workplace->female)).'%';
                                        @endphp
                                        <p class="alert-{{getPercentageStatusColor($fp)}} p-1 mb-0" style="width:{{$fp}}">
                                            {{$fp}}
                                        </p>
                                    </td>
                                </tr>    
                            </table>

                           <h4> 1. Family history summary.</h4>
                            Seventeen (17) workersreported to have positive family history of diseases which run in families such as Hypertension, Diabetes mellitus, Asthma, Sickle Cell Disease, etc.   

                            <h4 class="text-center mt-2">FAMILY HISTORY</h4>
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th>%</th>
                                </tr>
                                <tr>
                                    <th>HISTORY OF FAMILY DISEASES</th>
                                    <td>{{$workplace->male}}</td>
                                    <td>
                                        @php
                                            $mp = number_format(getPercentage($workplace->male,$workplace->male+$workplace->female)).'%';
                                        @endphp
                                        <p class="alert-{{getPercentageStatusColor($mp)}} p-1 mb-0" style="width:{{$mp}}">
                                            {{$mp}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>NON KNOWN HX FAMILY DISEASES</th>
                                    <td>{{$workplace->female}}</td>
                                    <td>
                                        @php
                                            $fp = number_format(getPercentage($workplace->female,$workplace->male+$workplace->female)).'%';
                                        @endphp
                                        <p class="alert-{{getPercentageStatusColor($fp)}} p-1 mb-0" style="width:{{$fp}}">
                                            {{$fp}}
                                        </p>
                                    </td>
                                </tr>    
                            </table>  

                            <h4>2. Summary from past medical history</h4>
                            Fifteen(15) employees had significant positive past medical histories of differentillnesses and injuries however they are not occupational related.

                            <h4>3. Summary from Systemic Review</h4>
                            Eleven(11)workers had complaints such as headache, malaise, rhinorrhea etc. sixteen (16) had lower back pains, and majority had nooccupational related physical complaints.

                            <h4>4. Summary from physical/general examination</h4>
                            The following were observed.
                            Eight (8) employeeshad Low body mass Index, while those with High body mass index were 51, Majority(337) were normal.

                            <h4 class="text-center mt-2">DISTRIBUTION OF BODY MASS INDEX</h4>
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th>%</th>
                                </tr>
                                <tr>
                                    <th>NORMAL</th>
                                    <td>{{$workplace->male}}</td>
                                    <td>
                                        @php
                                            $mp = number_format(getPercentage($workplace->male,$workplace->male+$workplace->female)).'%';
                                        @endphp
                                        <p class="alert-{{getPercentageStatusColor($mp)}} p-1 mb-0" style="width:{{$mp}}">
                                            {{$mp}}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>LOW</th>
                                    <td>{{$workplace->female}}</td>
                                    <td>
                                        @php
                                            $fp = number_format(getPercentage($workplace->female,$workplace->male+$workplace->female)).'%';
                                        @endphp
                                        <p class="alert-{{getPercentageStatusColor($fp)}} p-1 mb-0" style="width:{{$fp}}">
                                            {{$fp}}
                                        </p>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>HIGH</th>
                                    <td>{{$workplace->female}}</td>
                                    <td>
                                        @php
                                            $fp = number_format(getPercentage($workplace->female,$workplace->male+$workplace->female)).'%';
                                        @endphp
                                        <p class="alert-{{getPercentageStatusColor($fp)}} p-1 mb-0" style="width:{{$fp}}">
                                            {{$fp}}
                                        </p>
                                    </td>
                                </tr>    
                            </table> 

                            Appropriate dietary and lifestyle counseling were done for those with underweight, over weight and obese employees.<br>

                            •   Sixteen (16)employees were having vision problem. All advised to attend ophthalmology clinic.<br>
                            •   Sixty -one (61) employees were having Dental carries. Advised to attend dental clinic.<br>

                            •   One hundred twenty one (121) employees had high blood pressure out of which 56had malignant hypertension advised to start cardiac clinics immediately; 2had low blood pressure while majority (274) had normal Blood Pressure during the test.<br>

                            <h4>5.  Audiometry.</h4>
                            •   All workers had normal audiometry except two who had unilateral diminished hearing since childhood.<br>

                            <h4>6.  Conclusion and recommendation</h4>
                             @php //todo add field in workplace checkup to set a conclusion statement for each @endphp   
                            The work process at Alliance One Tobacco (T) LTD may have exposed workers to work related hazards such as harmful noise levels, poor illumination and ergonomic problems, that may lead to musculoskeletal injuries, etc. In order to ascertain the level of exposure, associated risks, and therefore plan and implement appropriate control measures against occupational hazards, the followings are recommended<br>

                            •   Regular Risk assessment to be done as per section 60 of OHS Act. <br>
                            •   Refresher training courses of workers on first aid.<br>
                            •   All workers should undergo pre-employment medical examination when they are employed and annual periodic medical examination and exit medical examinations.<br>
                            •   For employees who require follow up medical services, please assist them accordingly, while at work.<br><br>

                            <i>Prepared by: </i> <strong>Dr S.J. NYUMBA MMEDICAL INSPECTOR -OSHA MOROGORO</strong>


      
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
