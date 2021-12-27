@extends('layouts.master')
@extends('box.booking.booking')
@section('title')
    Booking
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Booking Seat</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr class="bg-info">
                                <th>Branch</th>
                                <th>Seat</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <th>{{$row->name}}</th>
                                <td>
                                    @php
                                        $seat = $row->seat()->where('status', 'Available')->orderBy('seatTypeID')->get();
                                    @endphp
                                    @foreach($seat as $rows)
                                        @php
                                            $color = $rows->colour;
                                            $bg = $color[0];
                                            $tx =  $color[1];

                                        if($rows->status == 'Disabled'){
                                            $ico = '<i class="icon-heart-broken2"></i>';
                                            $title = 'Seat is not available';
                                        }else{
                                            $ico = '<i class="icon-furniture"></i>';
                                            $title = 'Rant:'.money($rows->amount).'. Seat Type: '.$rows->seatType.'. '.$rows->description;
                                        }
                                        @endphp
                                        <button title="{!! $title !!}"

                                                type="button"
                                                class="btn btn-default btn-float btn-float-lg bookBtn"
                                                style="background-color: {{$bg}}; color: {{$tx}};"
                                                data-id="{{$rows->seatID}}"
                                                data-building="{{$rows->building}}"
                                                data-floor="{{$rows->floor}}"
                                                data-room="{{$rows->room}}"
                                                data-branch="{{$rows->branchID}}"
                                                data-seatnumber="{{$rows->seatNumber}}"
                                                data-branchname="{{$rows->branchName}}"
                                                data-seattypeid="{{$rows->seatTypeID}}"
                                                data-seattype="{{$rows->seatType}}"
                                                data-colour="{{$rows->getOriginal('colour')}}"
                                                data-amount="{{$rows->amount}}"
                                                data-status="{{$rows->status}}"
                                                data-description="{{$rows->description}}"
                                                data-url="{{action('Seat\SeatController@del', ['id' => $rows->seatID])}}"
                                                data-urls="{{action('Seat\SeatController@disabled', ['id' => $rows->seatID])}}"
                                                data-toggle="modal" data-target="#bookingModal"> {!! $ico !!} <span>{{$rows->seatNumber}}</span></button>
                                    @endforeach
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
            $('.select2').select2();



        });

        $(function () {
            $('.bookBtn').click(function () {
                var seatID = $(this).data('id');
                var building = $(this).data('building');
                var floor = $(this).data('floor');
                var room = $(this).data('room');
                var branchID = $(this).data('branch');
                var branchName = $(this).data('branchname');
                var seatType = $(this).data('seattype');
                var seatTypeID = $(this).data('seattypeid');
                var colour = $(this).data('colour');
                var amount = $(this).data('amount');
                var description = $(this).data('description');
                var seatNumber = $(this).data('seatnumber');
;

                $('#bookingModal [name=seatID]').val(seatID);
                $('#bookingModal [name=building]').val(building);
                $('#bookingModal [name=floor]').val(floor);
                $('#bookingModal [name=room]').val(room);
                $('#bookingModal [name=branchID]').val(branchID);
                $('#bookingModal [name=branchName]').val(branchName);
                $('#bookingModal [name=seatNumber]').val(seatNumber);
                $('#bookingModal [name=seatType]').val(seatType);
                $('#bookingModal [name=seatTypeID]').val(seatTypeID);
                $('#bookingModal [name=colour]').val(colour);
                $('#bookingModal [name=amount]').val(amount);
                $('#bookingModal [name=description]').val(description);

                ranters();

                $('#ranterID').change(function () {
                    ranters();
                });

            });
        });


        function ranters(){
            var name = $('#ranterID').find('option:selected').data('name');
            var types = $('#ranterID').find('option:selected').data('types');
            var img = $('#ranterID').find('option:selected').data('img');
            $('#rName').html(name);
            $('#bookingModal [name=ranterName]').val(name);
            $('#rType').html(types);
            $('#bookingModal [name=ranterType]').val(types);
            $('#rImg').attr("src", "{{asset('public/ranter/')}}"+"/"+img);
        }

        $(function () {
            $('.date_pic').daterangepicker({
                singleDatePicker: true,
                // showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

        });

    </script>

@endsection