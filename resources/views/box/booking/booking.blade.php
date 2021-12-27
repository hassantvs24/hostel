@section('box')

    <!-- Basic modal -->
    <div id="bookingModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> New Booking</h5>
                </div>

                <form action="{{action('Booking\BookingController@booking')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="seatID">
                    <input type="hidden" name="branchID">
                    <input type="hidden" name="seatType">
                    <input type="hidden" name="ranterType">
                    <input type="hidden" name="ranterName">
                    <input type="hidden" name="seatNumber">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Select Ranter</label>
                                    <div class="col-lg-9">
                                        <select id="ranterID" name="ranterID" class="form-control select2" required>
                                            <option value="" selected="" disabled=""> Select an Option</option>
                                            @foreach($ranter as $row)
                                                <option value="{{$row->ranterID}}" data-name="{{$row->name}}" data-types="{{$row->ranterType}}" data-img="{{$row->photo}}">{{$row->serialNo}}. {{$row->name}} -> {{$row->ranterType}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Branch</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="branchName" placeholder="Branch Name" type="text" readonly>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Building</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="building" placeholder="Building" type="text" readonly>
                                    </div>
                                </div><br>

                                <!--<div class="form-group">
                                    <label class="col-lg-3 control-label">Floor</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="floor" placeholder="Floor" type="text" readonly>
                                    </div>
                                </div><br>-->

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Seat Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="room" placeholder="Seat Number" type="text" readonly>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Monthly Rent</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="amount" placeholder="Monthly Rent" min="0" value="0" type="number" step="any" readonly>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Admission Fee</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="admissionFees" placeholder="Admission Fee" min="0" value="0" type="number" step="any" required>
                                    </div>
                                </div><br>


                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Security Money</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="securityMoney" placeholder="Security Money" min="0" value="0" type="number" step="any" required>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Booking Cancel Date</label>
                                    <div class="col-lg-9">
                                        <input class="form-control date_pic" name="bookingCancelDate" placeholder="Booking Cancel Date" type="text" required>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Booking Date</label>
                                    <div class="col-lg-9">
                                        <input class="form-control date_pic" name="created_at" placeholder="Booking Date" type="text" required>
                                    </div>
                                </div><br>



                            </div>
                            <div class="col-md-4">
                                <img id="rImg" class="img-thumbnail" src="" style="width: 90%;" alt="Photo">
                                <p class="no-margin"><b>Name: </b><span id="rName"></span></p>
                                <p class="no-margin"><b>Type: </b><span id="rType"></span></p>

                                <div class="form-group mt-10 mb-5">

                                    <label class="control-label col-lg-12 text-bold">Booking Notes</label>
                                    <div class="col-lg-12">
                                        <textarea name="bookingNote" class="form-control" rows="2" placeholder="Write Note About This Booking ..........."></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>


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



@endsection
