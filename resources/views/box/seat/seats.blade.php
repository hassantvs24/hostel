@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New Seat for <span class="text-danger branchs"></span> Branch</h5>
                </div>

                <form action="{{action('Seat\SeatController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="branchID">

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Branch name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="branchName" placeholder="Branch name" type="text" readonly>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Type</label>
                            <div class="col-lg-9">
                                <select name="seatTypeID" id="seatType" class="form-control" required>
                                    <option value="" selected="" disabled=""> Select an Option</option>
                                    @foreach($seatType as $row)
                                        <option value="{{$row->seatTypeID}}" data-name="{{$row->name}}" data-price="{{$row->amount}}" data-color="{{$row->getOriginal('colour')}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="seatType">
                                <input type="hidden" name="colour">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Building</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="building" placeholder="Building" type="text" required>
                            </div>
                        </div><br>

                        <!--<div class="form-group">
                            <label class="col-lg-3 control-label">Floor</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="floor" placeholder="Floor" type="text" required>
                            </div>
                        </div><br>-->

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Number</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="room" placeholder="Seat Number" type="text" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Price</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="amount" placeholder="Seat Price" min="0" value="0" type="number" step="any" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Descriptions</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="description" placeholder="Write Descriptions About Room" type="text">
                            </div>
                        </div><br>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->


    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit <span class="text-danger branchs"></span> Branch Seat</h5>
                </div>

                <form action="{{action('Seat\SeatController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <input type="hidden" name="branchID">

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Branch name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="branchName" placeholder="Branch name" type="text" readonly>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Type</label>
                            <div class="col-lg-9">
                                <select name="seatTypeID" id="seatType2" class="form-control" required>
                                    <option value="" selected="" disabled=""> Select an Option</option>
                                    @foreach($seatType as $row)
                                        <option value="{{$row->seatTypeID}}" data-name="{{$row->name}}" data-price="{{$row->amount}}" data-color="{{$row->getOriginal('colour')}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="seatType">
                                <input type="hidden" name="colour">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Building</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="building" placeholder="Building" type="text" required>
                            </div>
                        </div><br>

                        <!--<div class="form-group">
                            <label class="col-lg-3 control-label">Floor</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="floor" placeholder="Floor" type="text" required>
                            </div>
                        </div><br>-->

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Number</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="room" placeholder="Seat Number" type="text" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Price</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="amount" placeholder="Seat Price" min="0" value="0" type="number" step="any" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Descriptions</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="description" placeholder="Write Descriptions About Room" type="text">
                            </div>
                        </div><br>


                    </div>

                    <div class="modal-footer">
                        <a id="delHref" class="btn btn-info" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin2"></i> Delete</a>
                        <a id="disableHref" class="btn btn-default" onclick="return confirm('Are you sure to disable this seat?')"><i class="icon-heart-broken2"></i> Disabled</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->

@endsection