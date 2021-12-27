@extends('layouts.master')
@extends('box.collection.collection')
@section('title')
    Collection Ledger
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Collection Ledger</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Address</th>
                            <th>Branch</th>
                            <th>Remark</th>
                            <th>Amount</th>
                            <th class="text-right">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            @php
                                $ranter = $row->ranter($row->refID);
                            @endphp
                                <tr>
                                    <td>{{pub_date($row->created_at)}}</td>
                                    <td>{{$ranter->seat($ranter->ranterID)->seatNumber ?? ''}}</td>
                                    <td>{{$ranter->name}}</td>
                                    <td>{{$ranter->contact}}</td>
                                    <td>{{$ranter->ranterType}}</td>
                                    <td>{{$ranter->address}}</td>
                                    <td>{{$row->branch['name'] ?? ''}}</td>
                                    <td>{{$row->remark}} {{$row->accounts == '' ? '':'('.$row->accounts.')'}}</td>
                                    <td>{{money($row->amountIN)}}</td>
                                    <td class="text-right">
                                        <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-accounts="{{$row->accounts}}"  data-remark="{{$row->remark}}" data-amount="{{$row->amountIN}}" data-id="{{$row->cashbookID}}" data-toggle="modal" data-target="#ediCollection" title="Edit"><i class="icon-pencil5"></i></button>
                                        <a class="btn btn-xs btn-danger no-padding" href="{{action('Collections\CollectionLedgerController@del', ['id' => $row->cashbookID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var amount = $(this).data('amount');
                var remark = $(this).data('remark');
                var accounts = $(this).data('accounts');

                $('#ediCollection [name=cashbookID]').val(id);
                $('#ediCollection [name=amount]').val(amount);
                $('#ediCollection [name=remark]').val(remark);
                $('#ediCollection [name=accounts]').val(accounts);
            });
        });


        $(function () {
            $('.date_pic').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [9] }//For Column Order
                ]
            });
        });

    </script>

@endsection
