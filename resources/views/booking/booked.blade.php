@extends('layouts.master')
@extends('box.booking.booking_edi')
@section('title')
    Booked List
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Booked List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Seat Type</th>
                            <th>Branch</th>
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
                                <td>{{$row->seatType}}</td>
                                <td>{{$row->branchName}}</td>
                                <td class="text-right white_sp">
                                    <a class="btn btn-xs btn-info no-padding mr-5" href="{{action('Booking\BookingController@money_receipt', ['id' => $row->bookingID])}}" title="Edit"><i class="icon-eye"></i></a>
                                    <button class="btn btn-xs btn-success no-padding bookBtn mr-5" type="button"  data-id="{{$row->bookingID}}" data-status="{{$row->bookingStatus}}" data-candate="{{pub_date($row->bookingCancelDate)}}" data-udate="{{pub_date($row->created_at)}}" data-admission="{{$row->admissionFees}}" data-security="{{$row->securityMoney}}"   title="Edit" data-toggle="modal" data-target="#bookModal"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Booking\BookingController@cancel_booking',['id'=> $row->bookingID, 'ranterID' => $row->ranterID])}}"  onclick="return confirm('Are you sure to Cancel?')" title="Cancel"><i class="icon-bin"></i></a>
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
            $('.bookBtn').click(function () {
                var id = $(this).data('id');
                var status = $(this).data('status');
                var candate = $(this).data('candate');
                var udate = $(this).data('udate');
                var admission = $(this).data('admission');
                var security = $(this).data('security');


                $('#bookModal [name=id]').val(id);
                $('#bookModal [name=admissionFees]').val(admission);
                $('#bookModal [name=securityMoney]').val(security);
                $('#bookModal [name=bookingCancelDate]').val(candate);
                $('#bookModal [name=created_at]').val(udate);
                $('#bookModal [name=bookingStatus]').val(status);

            });
        });


        $(function () {
            $('.date_pic').daterangepicker({
                singleDatePicker: true,
                // showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [6] }//For Column Order
                ]
            });
        });



    </script>

@endsection
