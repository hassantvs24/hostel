@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> New Expense</h5>
                </div>

                <form action="{{action('Expense\ExpenseController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Branch</label>
                            <div class="col-lg-9">
                                <select name="branchID" class="form-control">
                                    @foreach($branch as $row)
                                        <option value="{{$row->branchID}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-9">
                                <input class="form-control" list="cat" name="category" placeholder="Category" type="text"  autocomplete="off" required>
                                <datalist id="cat">
                                    @foreach($category as $row)
                                        <option value="{{$row->category}}">{{$row->category}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Source</label>
                            <div class="col-lg-9">
                                <input class="form-control" list="source" name="source" placeholder="Source" type="text" autocomplete="off">
                                <datalist id="source">
                                    @foreach($source as $row)
                                        <option value="{{$row->source}}">{{$row->source}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Amount</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="amountOUT" placeholder="Amount" type="number" step="any" value="0" min="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Descriptions</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="description" placeholder="Descriptions" type="text">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date</label>
                            <div class="col-lg-9">
                                <input class="form-control date_pic" name="created_at" placeholder="Date" type="text" required>
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
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Expense</h5>
                </div>

                <form action="{{action('Expense\ExpenseController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Branch</label>
                            <div class="col-lg-9">
                                <select name="branchID" class="form-control">
                                    @foreach($branch as $row)
                                        <option value="{{$row->branchID}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-9">
                                <input class="form-control" list="cat1" name="category" placeholder="Category" type="text"  autocomplete="off" required>
                                <datalist id="cat1">
                                    @foreach($category as $row)
                                        <option value="{{$row->category}}">{{$row->category}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Source</label>
                            <div class="col-lg-9">
                                <input class="form-control" list="source1" name="source" placeholder="Source" type="text" autocomplete="off">
                                <datalist id="source1">
                                    @foreach($source as $row)
                                        <option value="{{$row->source}}">{{$row->source}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Amount</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="amountOUT" placeholder="Amount" type="number" step="any" value="0" min="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Descriptions</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="description" placeholder="Descriptions" type="text">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date</label>
                            <div class="col-lg-9">
                                <input class="form-control date_pic" name="created_at" placeholder="Date" type="text" required>
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
