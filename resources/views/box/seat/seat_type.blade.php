@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New Seat Type</h5>
                </div>

                <form action="{{action('Seat\SeatTypeController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Type name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" placeholder="Seat Type name" type="text" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Price</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="amount" placeholder="Price" type="number" min="0" step="any" value="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Background Colour</label>
                            <div class="col-lg-9">
                                <input type="text" name="bg" class="form-control colorpicker" data-preferred-format="hex" value="#4997EA">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Text Colour</label>
                            <div class="col-lg-9">
                                <input type="text" name="tx" class="form-control colorpicker" data-preferred-format="hex" value="#FFFFFF">
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
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Seat Types</h5>
                </div>

                <form action="{{action('Seat\SeatTypeController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Seat Type name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" placeholder="Seat Type name" type="text" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Price</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="amount" placeholder="Price" type="number" min="0" step="any" value="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Background Colour</label>
                            <div class="col-lg-9">
                                <input type="text" name="bg" class="form-control colorpickers" data-preferred-format="hex" value="#4997EA">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Text Colour</label>
                            <div class="col-lg-9">
                                <input type="text" name="tx" class="form-control colorpickers" data-preferred-format="hex" value="#FFFFFF">
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