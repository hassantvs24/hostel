@extends('layouts.master')
@extends('box.seat.seats')

@section('title')
    All Seat
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Seat</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed">
                        <thead>
                        <tr class="bg-orange">
                            <th>Branch</th>
                            <th>Seat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                        @foreach($table as $row)
                            <tr>
                                <th>{{$row->name}}</th>
                                <td>
                                    <button type="button" class="btn btn-default btn-float btn-float-lg nw_btn" data-name="{{$row->name}}" data-id="{{$row->branchID}}" data-toggle="modal" data-target="#myModal"><i class="icon-plus2"></i> <span>New Seat</span></button>
                                    @php
                                        $seat = $row->seat()->orderBy('seatTypeID')->get();
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
                                                class="btn btn-default btn-float btn-float-lg ediBtn"
                                                style="background-color: {{$bg}}; color: {{$tx}};"
                                                data-id="{{$rows->seatID}}"
                                                data-building="{{$rows->building}}"
                                                data-floor="{{$rows->floor}}"
                                                data-room="{{$rows->room}}"
                                                data-branch="{{$rows->branchID}}"
                                                data-branchname="{{$rows->branchName}}"
                                                data-seattypeid="{{$rows->seatTypeID}}"
                                                data-seattype="{{$rows->seatType}}"
                                                data-colour="{{$rows->getOriginal('colour')}}"
                                                data-amount="{{$rows->amount}}"
                                                data-status="{{$rows->status}}"
                                                data-description="{{$rows->description}}"
                                                data-url="{{action('Seat\SeatController@del', ['id' => $rows->seatID])}}"
                                                data-urls="{{action('Seat\SeatController@disabled', ['id' => $rows->seatID])}}"
                                                data-toggle="modal" data-target="#ediModal"> {!! $ico !!} <span>{{$rows->seatNumber}}</span></button>
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

    <script type="text/javascript">


        $(function () {
            $('.nw_btn').click(function () {
                var branchID = $(this).data('id');
                var branchName = $(this).data('name');

                $('#myModal [name=branchID]').val(branchID);
                $('#myModal [name=branchName]').val(branchName);
                $('#myModal .branchs').html(branchName);
            });

            seatType();

            $('#seatType').change(function () {
                seatType();
            });

        });


        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
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
                var url = $(this).data('url');
                var urls = $(this).data('urls');
                var status = $(this).data('status');

                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=building]').val(building);
                $('#ediModal [name=floor]').val(floor);
                $('#ediModal [name=room]').val(room);
                $('#ediModal [name=branchID]').val(branchID);
                $('#ediModal [name=branchName]').val(branchName);
                $('#ediModal [name=seatType]').val(seatType);
                $('#ediModal [name=seatTypeID]').val(seatTypeID);
                $('#ediModal [name=colour]').val(colour);
                $('#ediModal [name=amount]').val(amount);
                $('#ediModal [name=description]').val(description);

                $('#ediModal .branchs').html(branchName);

                $('#delHref').attr('href', url);
                $('#disableHref').attr('href', urls);

                if(status == 'Disabled'){
                    $('#disableHref').html('<i class="icon-heart5"></i> Enable');
                    $('#disableHref').attr('title', 'Enable');
                }else{
                    $('#disableHref').html('<i class="icon-heart-broken2"></i> Disabled');
                    $('#disableHref').attr('title', 'Disabled');
                }

                seatType2();
                $('#seatType2').change(function () {
                    seatType2();
                });
            });


        });

        function seatType(){
            var price = $('#seatType').find('option:selected').data('price');
            var colour = $('#seatType').find('option:selected').data('color');
            var seatType = $('#seatType').find('option:selected').data('name');
            $('#myModal [name=amount]').val(price);
            $('#myModal [name=colour]').val(colour);
            $('#myModal [name=seatType]').val(seatType);
        }

        function seatType2(){
            var price = $('#seatType2').find('option:selected').data('price');
            var colour = $('#seatType2').find('option:selected').data('color');
            var seatType = $('#seatType2').find('option:selected').data('name');
            $('#ediModal [name=amount]').val(price);
            $('#ediModal [name=colour]').val(colour);
            $('#ediModal [name=seatType]').val(seatType);
        }


        $(function () {


        });

    </script>

@endsection