@extends('layouts.master')
@extends('box.seat.seat_type')

@section('title')
    All Seat Types
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Seat Type</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Seat Types List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Type Name</th>
                            <th title="Background Colour & Text Colour">Colour</th>
                            <th>Price</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->serialNo}}</td>
                                <td>{{$row->name}}</td>
                                @php
                                    $color = $row->colour;
                                    $bg = $color[0];
                                    $tx =  $color[1];
                                @endphp
                                <td>
                                    <button class="btn btn-xs no-padding mr-5 p-5 pt-0 pb-0" style="background-color: {{$bg}}; color: {{$tx}};" title="Background Color">COLOR</button>
                                <td>{{money_c($row->amount)}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-bg="{{$bg}}" data-tx="{{$tx}}" data-name="{{$row->name}}" data-amount="{{$row->amount}}" data-id="{{$row->seatTypeID}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Seat\SeatTypeController@del', ['id' => $row->seatTypeID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
                var name = $(this).data('name');
                var amount = $(this).data('amount');
                var bg = $(this).data('bg');
                var tx = $(this).data('tx');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=amount]').val(amount);
                $('#ediModal [name=bg]').val(bg);
                $('#ediModal [name=tx]').val(tx);

                $(".colorpickers").spectrum({
                    showInput: true
                });
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