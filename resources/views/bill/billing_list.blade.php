@extends('layouts.master')
@extends('box.bill.bill')
@section('title')
    All Bill List
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Bill List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Bill</th>
                            <th>Amount</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->seatNumber}}</td>
                                <td>{{$row->ranterName}}</td>
                                <td>{{$row->ranterType}}</td>
                                <td>{{$row->billName}}</td>
                                <td>{{money($row->amount + $row->adCharge - $row->discount)}}</td>
                                <td class="text-right white_sp">
                                    <a class="btn btn-xs bg-teal-400 no-padding" href="{{action('Billing\BillingListController@biil_invoice',['id' => $row->billingID])}}" title="bill list"><i class="icon-eye"></i></a>
                                    <button class="btn btn-xs btn-success no-padding ediBtn" type="button" data-id="{{$row->billingID}}" data-discount="{{$row->discount}}" data-adcharge="{{$row->adCharge}}" data-amount="{{$row->amount}}"  data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Billing\NewBillingController@bill_del',['id' => $row->billingID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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


    <script type="text/javascript">
        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var discount = $(this).data('discount');
                var adcharge = $(this).data('adcharge');
                var amount = $(this).data('amount');

                $('#ediID').val(id);
                $('#ediModal [name=discount]').val(discount);
                $('#ediModal [name=adCharge]').val(adcharge);
                $('#ediModal [name=amount]').val(amount);

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
