@section('box')


    <!-- Basic Edi modal -->
    <div id="bookModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Booking</h5>
                </div>

                <form action="{{action('Booking\BookingController@edit_booking')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">

                    <div class="modal-body">

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
                            <label class="col-lg-3 control-label">Booking Status</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="bookingStatus">
                                    <option selected disabled>Select Booking Status</option>
                                    <option value="Not Sure">Not Sure</option>
                                    <option value="Sure">Sure</option>
                                </select>
                            </div>
                        </div><br>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Cancel Date</label>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->



@endsection

