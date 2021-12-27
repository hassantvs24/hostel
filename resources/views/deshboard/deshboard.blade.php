@extends('layouts.master')
@extends('box.deshboard.deshboard')
@section('title')
    Dashboard
@endsection
@section('content')



    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-flat border-top-xlg border-top-warning">
                <div class="panel-heading">
                    <h6 class="panel-title"><span class="text-semibold">Quick</span> Access</h6>
                </div>

                <div class="panel-body">
                    <a href="{{action('Collections\CollectionListController@index')}}" class="btn btn-success btn-float btn-float-lg m-5"><i class="icon-coins"></i> <span>Collection</span></a>
                    <a href="{{action('Booking\BookingController@index')}}" class="btn btn-info btn-float btn-float-lg m-5"><i class="icon-address-book3"></i> <span>Booking</span></a>
                    <a href="{{action('Income\IncomeController@index')}}" class="btn bg-blue-400 btn-float btn-float-lg m-5"><i class="icon-cloud-download2"></i> <span>Income</span></a>
                    <a href="{{action('Expense\ExpenseController@index')}}" class="btn btn-danger btn-float btn-float-lg m-5"><i class="icon-cloud-upload2"></i> <span>Expanse</span></a>
                    <a href="{{action('Ranter\RanterListController@index')}}" class="btn bg-indigo btn-float btn-float-lg m-5"><i class="icon-users4"></i> <span>Ranter</span></a>
                    <a href="{{action('Report\Collection\CollectionController@index')}}" class="btn bg-success-300 btn-float btn-float-lg m-5"><i class="icon-air"></i> <span>Collection Reports</span></a>
                </div>
            </div>

        </div>

        <div class="col-md-3">

            <div class="panel-body bg-indigo">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-users4"></i></span>
                </div>

                <h3 class="no-margin">{{$total_ranter}}</h3>
                Ranter

            </div>
            <div class="panel-body bg-indigo-300">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-users4"></i></span>
                </div>

                <h3 class="no-margin">{{$new_ranter}}</h3>
                New Renter this month
            </div>


            <div class="panel-body bg-success">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-furniture"></i></span>
                </div>

                <h3 class="no-margin">{{$total_seat}}</h3>
                Total Seat
            </div>

        </div>

        <div class="col-md-3">

            <div class="panel-body bg-success-300">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-furniture"></i></span>
                </div>

                <h3 class="no-margin">{{$total_seat_available}}</h3>
                Available Seat
            </div>

            <div class="panel-body bg-pink">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-book3"></i></span>
                </div>

                <h3 class="no-margin">{{$total_booking}}</h3>
                Total Booked
            </div>

            <div class="panel-body bg-pink-300">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-book3"></i></span>
                </div>

                <h3 class="no-margin">{{$new_booking}}</h3>
                New Booking this month

            </div>

        </div>
    </div>

    <div class="row mt-15">
        <div class="col-md-3">
            <div class="panel-body bg-success">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-coins"></i></span>
                </div>

                <h3 class="no-margin">{{money($month_collection)}}</h3>
                Total collection this month
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel-body bg-danger">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-cloud-download2"></i></span>
                </div>

                <h3 class="no-margin">{{money($month_expance)}}</h3>
                Total expanse this month
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel-body bg-blue">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-cloud-upload2"></i></span>
                </div>

                <h3 class="no-margin">{{money($month_income)}}</h3>
                Total income this month
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel-body bg-info">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-calculator2"></i></span>
                </div>

                <h3 class="no-margin">{{money($month_collection - $month_expance + $month_income)}}</h3>
                Total Profit this month
            </div>
        </div>
    </div>

    <div class="row mt-15">

            <div class="col-md-12">
                <div class="panel panel-flat border-top-success">
                    <div class="panel-heading">
                        <h6 class="panel-title">All Not Sure Booking List</h6>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-condensed table-hover table-striped datatable">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Cancel Date</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Seat Type</th>
                                <th>Branch</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notif_cancel_booking as $row)
                                <tr>
                                    <td>{{pub_date($row->created_at)}}</td>
                                    <td>{{pub_date($row->bookingCancelDate)}}</td>
                                    <td>{{$row->seatNumber}}</td>
                                    <td>{{$row->ranterName}}</td>
                                    <td>{{$row->seatType}}</td>
                                    <td>{{$row->branchName}}</td>
                                    <td class="text-right white_sp">
                                        <a class="btn btn-xs btn-success no-padding mr-5" href="{{action('Booking\BookingController@sure_book', ['id' => $row->bookingID])}}" onclick="return confirm('Are you sure to change this booking status?')" title="Sure Booking" ><i class="icon-checkmark4"></i></a>
                                        <a class="btn btn-xs btn-info no-padding mr-5" href="{{action('Booking\BookingController@money_receipt', ['id' => $row->bookingID])}}" title="View Booking"><i class="icon-eye"></i></a>
                                        <a class="btn btn-xs btn-danger no-padding" href="{{action('Booking\BookingController@cancel_booking',['id'=>$row->bookingID])}}"  onclick="return confirm('Are you sure to Cancel this booking?')" title="Cancel"><i class="icon-bin"></i></a>
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

    <script type="text/javascript">

        $(function () {
            var checks = $('#companyCheck').val();

            if(checks > 0){
                $('#myModal').modal('hide');
            }else{
                $('#myModal').modal('show');
            }

        });

        $(function () {
            $("#inputFile").change(function () {
                imgPrev(this , '.preview');
            });
        });

    </script>

@endsection
