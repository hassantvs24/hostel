@extends('layouts.print')

@section('title')
    {{$table->name}} Details Information
@endsection

@section('content')

    <!-- invoice template -->
    <input type="hidden" id="ranterType" value="{{$table->ranterType}}">
    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Ranter Details Information</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <a class="btn btn-danger btn-xs heading-btn" href="{{action('Ranter\RanterListController@index')}}"><i class="icon-arrow-left16 position-left"></i> Go Back</a>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>


        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Details Information For <span class="text-danger">{{$table->name}}</span></h5></div>
        </div>
        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Serial no: </b> #{{invoice_n($table->serialNo)}}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Date: </b>{{date("d/m/Y") }}</div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>

        <div class="row">
            <div class="col-xs-12 force_print">

                <table class="table table-bordered table-condensed">
                    <!-- Personal Information:Start-->
                    <tr>
                        <th  class="no-margin bg-brown p-5 pt-0 pb-0" colspan="4"><h4 class="no-margin no-padding">Personal Data</h4></th>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Ranter Type</th>
                        <td class="p-5 pt-0 pb-0">{{$table->ranterType}}</td>
                        <td class="p-5 pt-0 text-right" rowspan="8" colspan="2">
                            <img class="img-thumbnail photo_prev" src="{{asset('public/ranter/')}}/{{$table->photo ?? ''}}" style="height: 150px;" style="height: 150px;" alt="Photo">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->name}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Contact</th>
                        <td class="p-5 pt-0 pb-0">{{$table->contact}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Email</th>
                        <td class="p-5 pt-0 pb-0">{{$table->email}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Nationality</th>
                        <td class="p-5 pt-0 pb-0">{{$table->nationality}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">NID</th>
                        <td class="p-5 pt-0 pb-0">{{$table->nid}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Birth Day</th>
                        <td class="p-5 pt-0 pb-0">{{pub_date($table->dob)}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Birth Certificate</th>
                        <td class="p-5 pt-0 pb-0">{{$table->birth_register}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Passport</th>
                        <td class="p-5 pt-0 pb-0">{{$table->passport}}</td>
                        <th class="p-5 pt-0 pb-0 bg-brown">Marital Status</th>
                        <td class="p-5 pt-0 pb-0">{{$table->maritalStatus}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-brown">Blood Group</th>
                        <td class="p-5 pt-0 pb-0">{{$table->bloodGroup}}</td>
                        <th class="p-5 pt-0 pb-0 bg-brown">Address</th>
                        <td class="p-5 pt-0 pb-0">{{$table->address}}</td>
                    </tr>
                    <!-- Personal Information:End-->

                    <!-- Guardian:Start-->
                    <!-- First Guardian:Start-->
                    <tr>
                        <th  class="no-margin bg-info p-5 pt-0 pb-0" colspan="4"><h4 class="no-margin no-padding">Guardian Information</h4></th>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info text-center" colspan="2"><h5 class="no-margin no-padding">First Guardian</h5></th>
                        <td class="p-5 pt-0 text-right" rowspan="7" colspan="2">
                            <img class="img-thumbnail photo_prev" src="{{asset('public/ranter/')}}/{{$table->guardianPhoto ?? ''}}" style="height: 150px;" style="height: 150px;" alt="Photo">
                        </td>
                    </tr>

                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardian}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Relation</th>
                        <td class="p-5 pt-0 pb-0">{{$table->relations}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Contact</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianContact}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Occupation</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianOccupation}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">NID</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianNid}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Address</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianAddress}}</td>
                    </tr>
                    <!-- First Guardian:End-->
                    <!-- Second Guardian:Start-->
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info text-center" colspan="2"><h5 class="no-margin no-padding">Second Guardian</h5></th>
                        <td class="p-5 pt-0 text-right" rowspan="7" colspan="2">
                            <img class="img-thumbnail photo_prev" src="{{asset('public/ranter/')}}/{{$table->guardian1Photo ?? ''}}" style="height: 150px;" style="height: 150px;" alt="Photo">
                        </td>
                    </tr>

                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardian1}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Relation</th>
                        <td class="p-5 pt-0 pb-0">{{$table->relations1}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Contact</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardian1Contact}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Occupation</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardian1Occupation}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">NID</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardian1Nid}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Address</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardian1Address}}</td>
                    </tr>
                    <!-- Second Guardian:End-->

                    <!-- Local Guardian:Start-->
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info text-center" colspan="2"><h5 class="no-margin no-padding">Local Guardian</h5></th>
                        <td class="p-5 pt-0 text-right" rowspan="7" colspan="2">
                            <img class="img-thumbnail photo_prev" src="{{asset('public/ranter/')}}/{{$table->guardianPhotoLoc ?? ''}}" style="height: 150px;" style="height: 150px;" alt="Photo">
                        </td>
                    </tr>

                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianLoc}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Relation</th>
                        <td class="p-5 pt-0 pb-0">{{$table->relationsLoc}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Contact</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianContactLoc}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Occupation</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianOccupationLoc}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">NID</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianNidLoc}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-info">Address</th>
                        <td class="p-5 pt-0 pb-0">{{$table->guardianAddressLoc}}</td>
                    </tr>
                    <!-- Local Guardian:End-->
                    <!-- Guardian:End-->


                    <!-- Educational Info:Start-->
                    <tr>
                        <th  class="no-margin bg-violet p-5 pt-0 pb-0" colspan="4"><h4 class="no-margin no-padding">Educational/Job Information</h4></th>
                    </tr>
                    <!-- School/SSC Info:Start-->
                    <tr class="ssc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet text-center" colspan="4"><h5 class="no-margin no-padding">School/SSC Information</h5></th>
                    </tr>
                    <tr class="ssc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">School Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->school}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Group</th>
                        <td class="p-5 pt-0 pb-0">{{$table->groupSSC}}</td>
                    </tr>
                    <tr class="ssc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Class</th>
                        <td class="p-5 pt-0 pb-0">{{$table->classSSC}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Roll No</th>
                        <td class="p-5 pt-0 pb-0">{{$table->rollSSC}}</td>
                    </tr>
                    <tr class="ssc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Section</th>
                        <td class="p-5 pt-0 pb-0">{{$table->sectionSSC}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Time</th>
                        <td class="p-5 pt-0 pb-0">{{$table->classTimeSSC}}</td>
                    </tr>
                    <tr class="ssc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Board</th>
                        <td class="p-5 pt-0 pb-0">{{$table->boardSSC}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Year</th>
                        <td class="p-5 pt-0 pb-0">{{$table->passYearSSC}}</td>
                    </tr>
                    <!-- School/SSC Info:End-->


                    <!-- Collage/HSC Info:Start-->
                    <tr class="hsc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet text-center" colspan="4"><h5 class="no-margin no-padding">Collage/HSC Information</h5></th>
                    </tr>
                    <tr class="hsc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Collage Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->college}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Group</th>
                        <td class="p-5 pt-0 pb-0">{{$table->groupHSC}}</td>
                    </tr>
                    <tr class="hsc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Roll</th>
                        <td class="p-5 pt-0 pb-0">{{$table->rollHSC}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Session</th>
                        <td class="p-5 pt-0 pb-0">{{$table->sessionHSC}}</td>
                    </tr>
                    <tr class="hsc" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Board</th>
                        <td class="p-5 pt-0 pb-0">{{$table->boardHSC}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Year</th>
                        <td class="p-5 pt-0 pb-0">{{$table->passYearHSC}}</td>
                    </tr>
                    <!-- Collage/HSC Info:End-->

                    <!-- Honours Info:Start-->
                    <tr class="hns" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet text-center" colspan="4"><h5 class="no-margin no-padding">Honours Information</h5></th>
                    </tr>
                    <tr class="hns" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">University Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->universityHons}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Subject</th>
                        <td class="p-5 pt-0 pb-0">{{$table->subjectHons}}</td>
                    </tr>
                    <tr class="hns" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Student ID</th>
                        <td class="p-5 pt-0 pb-0">{{$table->studentIDHons}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Semester</th>
                        <td class="p-5 pt-0 pb-0">{{$table->semesterHons}}</td>
                    </tr>
                    <tr class="hns" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Year</th>
                        <td class="p-5 pt-0 pb-0">{{$table->yearsHons}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet"></th>
                        <td class="p-5 pt-0 pb-0"></td>

                    </tr>
                    <!-- Honours Info:End-->

                    <!-- Master's Info:Start-->
                    <tr class="ms" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet text-center" colspan="4"><h5 class="no-margin no-padding">Master's Information</h5></th>
                    </tr>
                    <tr class="ms" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">University Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->universityMS}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Subject</th>
                        <td class="p-5 pt-0 pb-0">{{$table->subjectMS}}</td>
                    </tr>
                    <tr class="ms" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Student ID</th>
                        <td class="p-5 pt-0 pb-0">{{$table->studentIDMS}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Semester</th>
                        <td class="p-5 pt-0 pb-0">{{$table->semesterMS}}</td>
                    </tr>
                    <tr class="ms" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Year</th>
                        <td class="p-5 pt-0 pb-0">{{$table->yearsMS}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet"></th>
                        <td class="p-5 pt-0 pb-0"></td>

                    </tr>
                    <!-- Master's Info:End-->

                    <!-- Other Course Info:Start-->
                    <tr class="coach" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet text-center" colspan="4"><h5 class="no-margin no-padding">Other Course Information</h5></th>
                    </tr>
                    <tr class="coach" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Institute Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->institute}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Subject</th>
                        <td class="p-5 pt-0 pb-0">{{$table->subjectCo}}</td>
                    </tr>
                    <tr class="coach" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Class Time</th>
                        <td class="p-5 pt-0 pb-0">{{$table->classTimeCo}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet"></th>
                        <td class="p-5 pt-0 pb-0"></td>
                    </tr>
                    <!-- Other Course Info:End-->

                    <!-- Job Info:Start-->
                    <tr class="jobs" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet text-center" colspan="4"><h5 class="no-margin no-padding">Job Information</h5></th>
                    </tr>
                    <tr class="jobs" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Company Name</th>
                        <td class="p-5 pt-0 pb-0">{{$table->Job}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Employee ID</th>
                        <td class="p-5 pt-0 pb-0">{{$table->employeeID}}</td>
                    </tr>
                    <tr class="jobs" style="display: none;">
                        <th class="p-5 pt-0 pb-0 bg-violet">Designation</th>
                        <td class="p-5 pt-0 pb-0">{{$table->designation}}</td>
                        <th class="p-5 pt-0 pb-0 bg-violet">Office</th>
                        <td class="p-5 pt-0 pb-0">{{$table->officeLocation}}</td>
                    </tr>
                    <!-- Job Info:End-->
                    <!-- Educational Info:End-->

                    <!-- Additional Info:Start-->
                    <tr>
                        <th  class="no-margin bg-success p-5 pt-0 pb-0" colspan="4"><h4 class="no-margin no-padding">Additional Information</h4></th>
                    </tr>

                    <tr>
                        <!--<th class="p-5 pt-0 pb-0 bg-success">Security Money</th>
                        <td class="p-5 pt-0 pb-0">{{money($table->securityMoney)}}</td>-->
                            <th class="p-5 pt-0 pb-0 bg-success">Date</th>
                            <td class="p-5 pt-0 pb-0">{{pub_date($table->created_at)}}</td>
                        <th class="p-5 pt-0 pb-0 bg-success">Discount</th>
                        <td class="p-5 pt-0 pb-0">{{money($table->discount)}}</td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-success">Additional Charge</th>
                        <td class="p-5 pt-0 pb-0">{{money($table->adCharge)}}</td>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="p-5 pt-0 pb-0 bg-success">Notes</th>
                        <td class="p-5 pt-0 pb-0" colspan="3">{{$table->note}}</td>
                    </tr>

                    <!-- Additional Info:End-->

                </table>




            </div>
        </div>

    </div>



@endsection
@section('script')
    <script type="text/javascript" src="{{asset('public/js/jquery.tablesorter.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {

          //  $("#myTable").tablesorter();

            var ranterType = $('#ranterType').val();

            educational_box(ranterType);


        })


        function educational_box(types) {
            switch(types) {
                case 'School':
                    $('.ssc').show();
                    $('.hsc, .hns, .ms, .coach, .jobs').hide();
                    break;
                case 'College':
                    $('.ssc, .hsc').show();
                    $('.hns, .ms, .coach, .jobs').hide();
                    break;
                case 'Coaching':
                    $('.ssc, .hsc, .coach').show();
                    $('.hns, .ms, .jobs').hide();
                    break;
                case 'Honours':
                    $('.ssc, .hsc, .hns').show();
                    $('.ms, .coach, .jobs').hide();
                    break;
                case 'Masters':
                    $('.ssc, .hsc, .hns, .ms').show();
                    $('.coach, .jobs').hide();
                    break;
                case 'MBA':
                    $('.ssc, .hsc, .hns, .ms').show();
                    $('.coach, .jobs').hide();
                    break;
                case 'Diploma':
                    $('.ssc, .hsc, .coach').show();
                    $('.hns, .ms, .jobs').hide();
                    break;
                case 'Job':
                    $('.jobs').show();
                    $('.ssc, .hsc, .hns, .ms, .coach').hide();
                    break;
                default:
                    $('.ssc').show();
                    $('.hsc, .hns, .ms, .coach, .jobs').hide();
            }
        }

    </script>
@endsection