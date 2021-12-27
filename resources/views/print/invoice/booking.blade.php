@extends('layouts.print')
@section('title')
    Slip No #{{invoice_n($table->billNameID)}}
@endsection

@section('content')
    <div class="panel panel-white mb-5">
        <div class="panel-heading hidden-print">
            <h6 class="panel-title">Money Receipt</h6>
            <div class="heading-elements">
                <a class="btn btn-danger btn-xs heading-btn" href="{{URL::previous()}}"><i class="icon-arrow-left16 position-left"></i> Go Back</a>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
        </div>

        <div class="panel-body no-padding-bottom no-margin-bottom">
            <div class="row">
                <div class="col-xs-12 text-center mb-10">
                    <h1 class="m-0"></h1>
                    <p class="m-0 text-size-small"></p>
                    <p class="m-0 text-size-small">
                        <span class="white_sp"></span>
                    </p>
                    <p class="m-0 text-size-small">
                        <span class="white_sp"></span> <span class="white_sp"></span>
                    </p>
                </div>

            </div>

            <div class="row mb-10">
                <!--<div class="col-xs-4">
                    <img src="{{asset('public/logo/'.$company->logo)}}">
                </div>-->
                <div class="col-xs-8">
                    <h1 style="margin: 0px;"><span style="border: 1px solid #00232c; padding: 0px 5px;">MONEY RECEIPT (BOOKING)</span></h1>
                    <p class="m-0"><b>ADDRESS: </b> {{$company->address}}</p>
                    @if($company->email != '')
                    <p class="m-0"><b>EMAIL: </b> {{$company->email}}</p>
                    @endif

                    @if($company->website != '')
                    <p class="m-0"><b>WEBSITE: </b> {{$company->website}}</p>
                    @endif

                    <p class="m-0"><b>MOBILE: </b> {{$company->mobile}}
                        @if($company->phone != '')
                        ; <b>PHONE: </b> {{$company->phone}}</p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <p class="m-0"><b>RECEIPT NO: </b>#{{invoice_n($table->bookingID)}}</p>
                </div>
                <div class="col-xs-6 text-right"><b>DATE: </b> {{date('d/m/Y')}}</div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <hr style="margin-top: 0px;">
                    <table style="width: 100%">
                        <tr>
                            <th>NAME</th>
                            <td colspan="3">{{$table->ranter['name'] ?? ''}}</td>
                            <th>ID</th>
                            <td class="text-danger">{{$table->seatNumber}}</td>
                        </tr>
                        <tr>
                            <th>MOBILE</th>
                            <td colspan="3">{{$table->ranter['contact'] ?? ''}}</td>
                            <th>ADMISSION TYPE</th>
                            <td>{{$table->ranter['ranterType'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>GUARDIAN'S NAME</th>
                            <td colspan="3">{{$table->ranter['guardian'] ?? ''}} ({{$table->ranter['relations']}})</td>
                            <th>DATE OF ISSUE</th>
                            <td>{{pub_date($table->created_at)}}</td>
                        </tr>
                        <tr>
                            <th>GUARDIAN'S MOBILE</th>
                            <td colspan="3">{{$table->ranter['guardianContact'] ?? ''}}</td>
                            <th>BOOKING MONTH</th>
                            <td>{{pub_month($table->created_at)}}</td>
                        </tr>
                        <tr>
                            <th>ADDRESS</th>
                            <td colspan="5">{{$table->ranter['address'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="p-5"></th>
                            <td colspan="3" class="p-5"></td>
                        </tr>
                        <tr>
                            <th>BUILDING NO</th>
                            <td>{{$table->building}}</td>
                            <th>SEAT NO</th>
                            <td>{{$table->room}}</td>
                            <th>BRANCH</th>
                            <td>{{$table->branchName}}</td>
                        </tr>
                        <tr>
                            <th>ADMISSION FEE</th>
                            <td>{{money($table->admissionFees)}}</td>
                            <th>SECURITY</th>
                            <td>{{money($table->securityMoney)}}</td>
                            <th>RECEIVED</th>
                            <td>{{money($table->admissionFees + $table->securityMoney)}}</td>
                        </tr>
                        <tr>
                            <th>IN WORD</th>
                            <td colspan="5" class="text-italic">{{ucwords(in_word($table->admissionFees + $table->securityMoney))}}</td>
                        </tr>

                        <tr>
                            <td colspan="3" class="text-center" style="padding: 25px 5px;"></td>
                            <td colspan="3" class="text-center" style="padding: 25px 5px;"></td>
                        </tr>

                        <tr>
                            <th colspan="3" class="text-left"><span style="border-top: 1px solid black;">Authorization Signature</span></th>
                            <th colspan="3" class="text-right"><span style="border-top: 1px solid black;">Customer Signature</span></th>
                        </tr>


                    </table>
                </div>
            </div>


        </div>

    </div>







@endsection

@section('script')

@endsection

