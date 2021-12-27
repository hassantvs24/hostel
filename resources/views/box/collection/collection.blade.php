@section('box')

    <!-- Basic Edi modal -->
    <div id="billCollection" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-wallet"></i> Bill Collection</h5>
                </div>



                <form action="{{action('Collections\CollectionListController@bill_collection')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ranterID" name="ranterID">
                    <div class="modal-body">
                        <div class="form-group">
                            <p><strong>Name:</strong> <span id="rName"></span></p>
                            <p><strong>Contact:</strong> <span id="rContact"></span></p>
                            <p><strong>Seat No.:</strong> <span id="rSeat"></span></p>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Collection Amount:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="amount" placeholder=" Amount" type="number" step="any" value="0" min="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Remark</label>
                            <div class="col-lg-8">
                                <select name="remark" class="form-control">
                                    <option value="Cash">Cash</option>
                                    <option value="Bank">Bank</option>
                                    <option value="bKash">bKash</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">A/C</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="accounts" placeholder="A/C" type="text">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Date</label>
                            <div class="col-lg-8">
                                <input class="form-control date_pic" name="created_at" placeholder="Date" type="text" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="modal-footer mt-15">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->

    <div id="ediCollection" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-wallet"></i> Edit Collection</h5>
                </div>



                <form action="{{action('Collections\CollectionLedgerController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="cashbookID" name="cashbookID">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Collection Amount:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="amount" placeholder=" Amount" type="number" step="any" value="0" min="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Remark</label>
                            <div class="col-lg-8">
                                <select name="remark" class="form-control">
                                    <option value="Cash">Cash</option>
                                    <option value="Bank">Bank</option>
                                    <option value="bKash">bKash</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">A/C</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="accounts" placeholder="A/C" type="text">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Date</label>
                            <div class="col-lg-8">
                                <input class="form-control date_pic" name="created_at" placeholder="Date" type="text" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="modal-footer mt-15">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
