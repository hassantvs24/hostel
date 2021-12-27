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
            <div class="col-xs-12"><h5 class="text-center no-margin">Cash Balance</h5></div>
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
                        <th class="p-5 pt-0 pb-0 ">Department</th>
                        <th class="p-5 pt-0 pb-0 ">Description</th>
                        <th class="p-5 pt-0 pb-0 ">IN/OUT</th>
                        <th class="p-5 pt-0 pb-0 text-right">IN</th>
                        <th class="p-5 pt-0 pb-0 text-right">OUT</th>
                        <th class="p-5 pt-0 pb-0 text-right">BALANCE</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $i = 0;
                        $balance = 0;
                        $in = 0;
                        $out = 0;


                    @endphp
                    @foreach($table as $row)

                        @php
                            $balance += ($row->amountIN - $row->amountOUT);
                            $in += $row->amountIN;
                            $out += $row->amountOUT;
                            $i++;
                        @endphp

                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->sector}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->descriptions}}</td>
                            <td class="p-5 pt-0 pb-0 ">{{$row->transactionType}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money_c($row->amountIN)}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money_c($row->amountOUT)}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money_c($balance)}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="4">Total ({{$i}})</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($in)}}</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($out)}}</th>
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
