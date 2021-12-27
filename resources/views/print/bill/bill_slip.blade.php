@extends('layouts.print')
@section('title')
    Slip No #{{invoice_n($table->billNameID)}}
@endsection

@section('content')
    <div class="panel panel-white mb-5">
        <div class="panel-heading hidden-print">
            <h6 class="panel-title">View All Bill </h6>
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
                <div class="col-xs-12">
                    <table class="table table-hover table-bordered table-condensed table-hover">
                        <thead>
                        <tr>
                            <th class="pt-0 pb-0 p-5 text-center bg-teal">Date</th>
                            <th class="pt-0 pb-0 p-5 text-center bg-teal">ID</th>
                            <th class="pt-0 pb-0 p-5 text-center bg-teal">Ranter</th>
                            <th class="pt-0 pb-0 p-5 text-center bg-teal">Type</th>
                            <th class="pt-0 pb-0 p-5 text-right bg-teal">Discount</th>
                            <th class="pt-0 pb-0 p-5 text-right bg-teal">Ad. Charge</th>
                            <th class="pt-0 pb-0 p-5 text-right bg-teal">Monthly Bill</th>
                            <th class="pt-0 pb-0 p-5 text-right bg-teal">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                                $grand_amount = 0;
                                $i = 0;
                        @endphp
                        @foreach($billing as $row)
                            @php
                                $total = ($row->amount + $row->adCharge) - $row->discount;
                            @endphp
                            <tr>
                                <td class="pt-0 pb-0 p-5 text-center">{{pub_date($row->created_at)}}</td>
                                <td class="pt-0 pb-0 p-5 text-center">{{$row->seatNumber}}</td>
                                <td class="pt-0 pb-0 p-5 text-center">{{$row->ranterName}}</td>
                                <td class="pt-0 pb-0 p-5 text-center">{{$row->ranterType}}</td>
                                <td class="pt-0 pb-0 p-5 text-right">{{money($row->discount)}}</td>
                                <td class="pt-0 pb-0 p-5 text-right">{{money($row->adCharge)}}</td>
                                <td class="pt-0 pb-0 p-5 text-right">{{money($row->amount)}}</td>
                                <td class="pt-0 pb-0 p-5 text-right">{{money($total)}}</td>
                            </tr>

                            @php
                                $grand_amount += $total;
                                $i ++ ;
                            @endphp

                        @endforeach
                        <tr>
                            <th class="pt-0 pb-0 p-5 text-right" colspan="7">Total({{$i}})</th>
                            <th class="pt-0 pb-0 p-5 text-right">{{money($grand_amount)}}</th>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>


        </div>

    </div>







@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script type="text/javascript">

        $(function () {
            $('#mailer').click(function () {
                var url = $(this).data('href');
                $.get( url, function( result ) {
                    if(result == 1){
                        swal({
                            title: "Invoice send to employee email Successfully!!",
                            confirmButtonColor: "#2196F3",
                            type: "success"
                        });
                    }
                });
            });
        });

    </script>
@endsection
