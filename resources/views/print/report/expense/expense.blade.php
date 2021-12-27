@extends('layouts.print')

@section('title')
    Expense Reports
@endsection

@section('content')

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Other Expense Reports</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>


        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Expense Reports</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Date: </b>{{$date_rang}}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Report Date: </b>{{date("d/m/Y") }}</div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-striped table-hover table-condensed" id="myTable">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Date</th>
                        <th class="p-5 pt-0 pb-0 ">Category</th>
                        <th class="p-5 pt-0 pb-0 ">Source</th>
                        <th class="p-5 pt-0 pb-0 ">Branch</th>
                        <th class="p-5 pt-0 pb-0 text-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $i = 0;
                        $balance = 0;

                    @endphp
                    @foreach($table as $row)

                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <th class="p-5 pt-0 pb-0 ">{{$row->category}}</th>
                            <td class="p-5 pt-0 pb-0 ">{{$row->source}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->branch['name'] ?? ''}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money_c($row->amountOUT)}}</td>
                        </tr>

                        @php
                            $balance += $row->amountOUT;
                            $i++;
                        @endphp

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="4">Total ({{$i}})</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($balance)}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>



@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/js/jquery.tablesorter.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {

            $("#myTable").tablesorter();
        })

    </script>
@endsection
