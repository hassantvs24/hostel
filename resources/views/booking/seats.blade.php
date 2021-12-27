@extends('layouts.master')

@section('title')
    All Seat Status
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Seat Status</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Branch</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Renter Name</th>
                            <th>Contact</th>
                            <th>Ranter Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr rel="popover" title="{{$row->ranter['name'] ?? ''}}" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" data-img="{{asset('public/ranter/')}}/{{$row->ranter['photo'] ?? ''}}">
                                <td>{{$row->seatNumber}}</td>
                                <td>{{$row->branch['name'] ?? ''}}</td>
                                <td>{{$row->seatType}}</td>
                                <td>{{money($row->amount)}}</td>
                                <td>{{$row->ranter['name'] ?? ''}}</td>
                                <td>{{$row->ranter['contact'] ?? ''}}</td>
                                <td>{{$row->ranter['ranterType'] ?? ''}}</td>
                                <!--<td class="text-right white_sp">
                                    <a class="btn btn-xs btn-info no-padding mr-5" href="{{action('Booking\BookingController@money_receipt', ['id' => $row->bookingID])}}" title="Edit"><i class="icon-eye"></i></a>
                                    <button class="btn btn-xs btn-success no-padding bookBtn mr-5" type="button"  data-id="{{$row->bookingID}}" data-status="{{$row->bookingStatus}}" data-candate="{{pub_date($row->bookingCancelDate)}}" data-udate="{{pub_date($row->created_at)}}" data-admission="{{$row->admissionFees}}" data-security="{{$row->securityMoney}}"   title="Edit" data-toggle="modal" data-target="#bookModal"><i class="icon-pencil5"></i></button>

                                </td>-->
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

    <script type="text/javascript">

        $(function () {

            $('[data-toggle="popover"]').popover({
                content: function () {
                    return '<img style="width: 100%" src="'+$(this).data('img') + '" />';
                }
            });

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    //{ orderable: false, "targets": [6] }//For Column Order
                ]
            });




        });


    </script>

@endsection