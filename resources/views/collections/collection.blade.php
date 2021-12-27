@extends('layouts.master')
@extends('box.collection.collection')
@section('title')
    Collection List
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Collection List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Address</th>
                            <th>Branch</th>
                            <th>Due</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
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
                            <tr>
                                <td>{{$row->seat($row->ranterID)->seatNumber ?? ''}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->contact}}</td>
                                <td>{{$row->ranterType}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->seat($row->ranterID)->branch['name'] ?? ''}}</td>
                                <td>{{abs($total_amount)}}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-primary no-padding mr-5 ediBtn"  data-toggle="modal" data-branch="{{$row->branchID}}" data-amount="{{abs($total_amount)}}" data-name="{{$row->name}}" data-contact="{{$row->contact}}" data-seat="{{$row->seat($row->ranterID)->seatNumber ?? ''}}"  data-id ="{{$row->ranterID}}" data-target="#billCollection" title="Pay Salary"><i class="icon-wallet"></i></button>
                                </td>
                            </tr>
                            @endif
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
                var name = $(this).data('name');
                var contact = $(this).data('contact');
                var seat = $(this).data('seat');
                var branch = $(this).data('branch');

                $('#billCollection [name=ranterID]').val(id);
                $('#billCollection [name=branchID]').val(branch);
                $('#billCollection [name=amount]').val(amount);
                $('#billCollection #rName').html(name);
                $('#billCollection #rContact').html(contact);
                $('#billCollection #rSeat').html(seat);
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
                    { orderable: false, "targets": [7] }//For Column Order
                ]
            });
        });

    </script>

@endsection
