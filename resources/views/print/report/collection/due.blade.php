@extends('layouts.print')

@section('title')
    Due List
@endsection

@section('content')
    <!-- invoice template -->

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Due Reports</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10"></div>
        </div>


        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Due Reports</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Branch: </b> {{ $branch }}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Report Date: </b>{{date("d/m/Y") }}</div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10"></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table text-size-mini table-striped table-hover table-bordered table-condensed" id="myTable">
                    <thead>
                        <tr>
                            <th class="p-5 pt-0 pb-0 header">ID</th>
                            <th class="p-5 pt-0 pb-0 header">Name</th>
                            <th class="p-5 pt-0 pb-0 header">Contact</th>
                            <th class="p-5 pt-0 pb-0 header">Type</th>
                            <th class="p-5 pt-0 pb-0 header">Address</th>
                            <th class="p-5 pt-0 pb-0 header">Branch</th>
                            <th class="p-5 pt-0 pb-0 header">Due</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $all_due = 0;
                        @endphp
                        @foreach($table as $row)
                            @php
                                $total_bill = 0;
                                $billing = $row->total_bill()->get();
                                foreach ($billing as $rows)
                                {
                                    $total_bill += ($rows->amount + $rows->adCharge - $rows->discount);
                                }
                                $total_amount = $row->total_pay($row->ranterID) - $total_bill;
                            @endphp
                            @if($total_amount < 0)
                                @if($branch != 'All')

                                    @if($row->seat($row->ranterID)->branch['name'] ?? '')
                                        @if($row->seat($row->ranterID)->branch['name'] == $branch)
                                        <tr>
                                            <td class="p-5 pt-0 pb-0 ">{{$row->seat($row->ranterID)->seatNumber ?? ''}}</td>
                                            <td class="p-5 pt-0 pb-0 ">{{$row->name}}</td>
                                            <td class="p-5 pt-0 pb-0 ">{{$row->contact}}</td>
                                            <td class="p-5 pt-0 pb-0 ">{{$row->ranterType}}</td>
                                            <td class="p-5 pt-0 pb-0 ">{{$row->address}}</td>
                                            <td class="p-5 pt-0 pb-0 ">{{$row->seat($row->ranterID)->branch['name'] ?? ''}}</td>
                                            <td class="p-5 pt-0 pb-0 ">{{money_abs($total_amount)}}</td>
                                        </tr>
                                        @php
                                            $all_due += abs($total_amount);

                                        @endphp
                                        @endif
                                    @endif



                                    @else

                                    <tr>
                                        <td class="p-5 pt-0 pb-0 ">{{$row->seat($row->ranterID)->seatNumber ?? ''}}</td>
                                        <td class="p-5 pt-0 pb-0 ">{{$row->name}}</td>
                                        <td class="p-5 pt-0 pb-0 ">{{$row->contact}}</td>
                                        <td class="p-5 pt-0 pb-0 ">{{$row->ranterType}}</td>
                                        <td class="p-5 pt-0 pb-0 ">{{$row->address}}</td>
                                        <td class="p-5 pt-0 pb-0 ">{{$row->seat($row->ranterID)->branch['name'] ?? ''}}</td>
                                        <td class="p-5 pt-0 pb-0 ">{{money_abs($total_amount)}}</td>
                                    </tr>
                                    @php
                                        $all_due += abs($total_amount);

                                    @endphp

                                @endif
                            @endif

                        @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="p-5 pt-0 pb-0 text-right" colspan="6">Total</th>
                                <th class="p-5 pt-0 pb-0 ">{{money($all_due)}}</th>
                            </tr>
                        </tfoot>
                    </table>

            </div>
        </div>

    </div>

@endsection
