@extends('layouts.print')

@section('title')
    Ranter Wise
@endsection

@section('content')
    <!-- invoice template -->

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Collection Reports</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10"></div>
        </div>

        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Today All Collection Reports</h5></div>
        </div>

        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Date: </b>{{$date_rang}}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Report Date: </b>{{date("d/m/Y") }}</div>
            <div class="col-xs-8"><b class="no-margin">Ranter Name: </b>{{$ranter->name}}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Contact: </b>{{$ranter->contact }}</div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10"></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-hover table-bordered table-condensed" id="myTable">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0 header">Date</th>
                        <th class="p-5 pt-0 pb-0 header">ID</th>
                        <th class="p-5 pt-0 pb-0  header">Ranter</th>
                        <th class="p-5 pt-0 pb-0 header">Contact</th>
                        <th class="p-5 pt-0 pb-0 header">Remark</th>
                        <th class="p-5 pt-0 pb-0 text-right header">Amount</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $total = 0;
                        $i= 0;
                    @endphp
                    @foreach($table as $row)
                        @php
                            $ranter = $row->ranter($row->refID);
                        @endphp
                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$ranter->seat($ranter->ranterID)->seatNumber ?? ''}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$ranter->name}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$ranter->contact}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->remark}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money($row->amountIN)}}</td>
                        </tr>
                        @php
                            $total += $row->amountIN;
                            $i++;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="5">Total ({{$i}})</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($total)}}</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>

    </div>

@endsection
