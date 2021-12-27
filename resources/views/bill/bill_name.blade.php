@extends('layouts.master')
@extends('box.bill.bill_name')

@section('title')
    All Bill List
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Bill</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All New Bill</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Bill Name</th>
                            <th>Lats Pay</th>
                            <th>Number of Bill</th>
                            <th>Total Billing Amount</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            @php
                                $billCount = $row->billing()->count();
                                $adAmount = $row->billing()->sum('adCharge');
                                $discountAmount = $row->billing()->sum('discount');
                                $billAmount = $row->billing()->sum('amount');
                                $total = ($billAmount + $adAmount) - $discountAmount;
                            @endphp
                            <tr>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{pub_date($row->last_pay)}}</td>
                                <td>{{$billCount}}</td>
                                <td>{{money($total)}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"  data-pay="{{pub_date($row->last_pay)}}" data-name="{{$row->name}}" data-created_at="{{pub_date($row->created_at)}}" data-branch="{{$row->branchID}}" data-id="{{$row->billNameID}}"  data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs bg-slate-700 no-padding" href="{{action('Billing\NewBillingController@bill_slip',['id' => $row->billNameID])}}" title="Print"><i class="icon-printer2"></i></a>
                                    <a class="btn btn-xs bg-teal-400 no-padding" href="{{action('Billing\NewBillingController@bill_list',['id' => $row->billNameID])}}" title="billlist"><i class="icon-wrench"></i></a>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Billing\NewBillingController@del',['id'=>$row->billNameID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/color/spectrum.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>


    <script type="text/javascript">
        $(function(){
            $('.date_pic').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format:'DD/MM/YYYY'
                }
            });
        });
        $(function () {
            $('.select2').select2();
        });

        $(function () {
            $('.select3').select2();
        });

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var created_at = $(this).data('created_at');
                var last_pay = $(this).data('pay');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=created_at]').val(created_at);
                $('#ediModal [name=last_pay]').val(last_pay);

            });
        });

        $(function () {
            $(".colorpicker").spectrum({
                showInput: true
            });
        });


        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [4] }//For Column Order
                ]
            });

        });

    </script>

@endsection
