@extends('layouts.master')
@section('title')
    Seat Swap
@endsection
@section('content')
    <form id="swapFrom" action="{{action('Swap\SwapController@swap')}}" method="post" enctype="multipart/form-data"  autocomplete="off">
        {{csrf_field()}}
        <input type="hidden" name="seatID_one">
        <input type="hidden" name="seatID_two">
        <input type="hidden" name="ranterID_one">
        <input type="hidden" name="ranterID_two">
        <input type="hidden" id="chekVal" value="0">
        <div class="row">
            <div class="col-md-10 mb-15">
                <div class="input-group">
                    <span class="input-group-addon">Swap</span>
                    <input type="text" name="seatNumberOne" class="form-control" placeholder="Seat Number" required onkeydown="return false;">
                    <span class="input-group-addon">With</span>
                    <input type="text" name="seatNumberTwo" class="form-control" placeholder="Seat Number" required onkeydown="return false;">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to swap those seat?')"><i class="icon-transmission"></i> Swap</button>
                    </span>
                    <span class="input-group-btn">
                        <button type="reset" id="swapReset" class="btn btn-warning"><i class="icon-history"></i> Reset</button>
                    </span>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Seat Swap</h6>
                </div>

                <div class="panel-body">

                    <table class="table table-bordered table-condensed">
                        <thead>
                        <tr class="bg-violet">
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
                                                data-seatnumber="{{$rows->seatNumber}}"
                                                data-ranter="{{$rows->ranterID}}"> {!! $ico !!} <span>{{$rows->seatNumber}}</span></button>
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
            $('.ediBtn').click(function () {
                var chekVal = $('#chekVal').val();
                var seatID = $(this).data('id');
                var ranterID = $(this).data('ranter');
                var seatNumber = $(this).data('seatnumber');

                if(chekVal == 0){
                    if(ranterID != ''){
                        $('#swapFrom [name=seatID_one]').val(seatID);
                        $('#swapFrom [name=ranterID_one]').val(ranterID);
                        $('#swapFrom [name=seatNumberOne]').val(seatNumber);
                        $('#chekVal').val(1);
                    }else{
                        alert('Please select seat with ranter first.')
                    }

                }else{
                    $('#swapFrom [name=seatID_two]').val(seatID);
                    $('#swapFrom [name=ranterID_two]').val(ranterID);
                    $('#swapFrom [name=seatNumberTwo]').val(seatNumber);
                    $('#chekVal').val(0);
                }

            });

            $('#swapReset').click(function () {
                $('#swapFrom [name=seatID_one]').val('');
                $('#swapFrom [name=ranterID_one]').val('');
                $('#swapFrom [name=seatNumberOne]').val('');
                $('#swapFrom [name=seatID_two]').val('');
                $('#swapFrom [name=ranterID_two]').val('');
                $('#swapFrom [name=seatNumberTwo]').val('');
                $('#chekVal').val(0);
            });


        });



    </script>

@endsection