@section('box')
<!-- Basic Edi modal -->
<div id="ediModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Bill Types</h5>
            </div>

            <form action="{{action('Billing\NewBillingController@bill_edit')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" id="ediID" name="id">

                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Discount</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="discount" value="0" min="0" type="number">
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Additional Charge</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="adCharge" value="0" min="0" type="number">
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Bill</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="amount" value="0" min="0" type="number">
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