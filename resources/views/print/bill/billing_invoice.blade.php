@extends('layouts.print')

@section('title')
    Invoice No {{invoice_n($table->serialNo)}}
@endsection

@section('content')
    <div class="panel panel-white mb-5">
        <div class="panel-heading hidden-print">
            <h6 class="panel-title">View Invoice </h6>
            <div class="heading-elements">
                <a class="btn btn-danger btn-xs heading-btn" href="{{URL::previous()}}"><i class="icon-arrow-left16 position-left"></i> Go Back</a>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
        </div>

        <div class="panel-body no-padding-bottom no-margin-bottom">
            <div class="row">
                <div class="col-xs-12 text-center mb-10">
                    <h1 class="m-0">Infinity Flame Soft</h1>
                    <p class="m-0 text-size-small">Rangmohol Tower, Bondorbazar, Sylhet</p>
                    <p class="m-0 text-size-small">
                        <span class="white_sp"><strong>Phone: </strong>01719894414; <strong>Mobile: </strong>01719894414</span>
                    </p>
                    <p class="m-0 text-size-small">
                        <span class="white_sp"><strong>Email: </strong>admin@admin.com;</span> <span class="white_sp"><strong>Website: </strong>https://infinityflamesoft.com</span>
                    </p>
                </div>

            </div>


            <div class="row">
                <div class="col-xs-12">
                    <hr class="mb-10 mt-10">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <p class="mb-0 text-teal text-uppercase"><strong>Ranter</strong></p>
                    <p class="no-margin text-uppercase"><strong>{{$ranter->name}}</strong></p>
                    <p class="no-margin">ADDRESS: {{$ranter->address}}</p>
                    <p class="no-margin">NID:{{$ranter->nid}}</p>
                    <p class="no-margin">CONTACT: {{$ranter->contact}}</p>
                </div>

                <div class="col-xs-6 text-right">
                    <h3 class="m-5 text-violet">Invoice No: #{{invoice_n($table->serialNo)}}</h3>
                    <p class="no-margin"><strong>Date: </strong>{{pub_date($table->created_at)}}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-hover table-bordered table-condensed table-hover mt-20">
                        <thead>
                        <tr>
                            <th class="pt-0 pb-0 p-5">Description</th>
                            <th class="pt-0 pb-0 p-5 text-right">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="pt-0 pb-0 p-5">Additional Charge</td>
                            <td class="pt-0 pb-0 p-5 text-right">{{money($table->adCharge)}}</td>

                        </tr>
                        <tr>
                            <td class="pt-0 pb-0 p-5">Discount</td>
                            <td class="pt-0 pb-0 p-5 text-right">{{money($table->discount)}}</td>

                        </tr>
                        <tr>
                            <td class="pt-0 pb-0 p-5">Bill</td>
                            <td class="pt-0 pb-0 p-5 text-right">{{money($table->amount)}}</td>

                        </tr>
                        </tbody>
                        @php
                        $total = ($table->amount + $table->adCharge) - $table->discount;
                        @endphp
                        <tfoot>
                        <tr>
                            <th class="pt-0 pb-0 p-5 text-right">Total</th>
                            <th class="pt-0 pb-0 p-5 text-right">{{money($total)}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 text-size-small">
                    <p class="text-capitalize"><strong>In Word: </strong>{{in_word($total)}}</p>
                </div>
                <div class="col-xs-6">
                    <table class="mt-15 text-size-small" style="width: 100%;">
                        <tbody><tr>
                            <th class="pt-0 pb-0 p-5 text-right">Total</th>
                            <td class="pt-0 pb-0 p-5 text-right">{{money($total)}}</td>
                        </tr>

                        <tr>
                            <th class="pt-0 pb-0 p-5 text-right">Payment</th>
                            <td class="pt-0 pb-0 p-5 text-right">{{money(0)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="row mb-5 mt-20 pt-20">
                <div class="col-xs-6 pt-20">
                    <p>Investor Signature</p>
                </div>

                <div class="col-xs-6 text-right  pt-20">
                    <p>Authority Signature</p>
                </div>
            </div>

        </div>
    </div>






@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script type="text/javascript">



    </script>
@endsection
