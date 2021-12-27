<div class="row">
    <div class="col-md-6">

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Discount</span>
                <input type="number" name="discount" class="form-control" step="any" min="0" placeholder="Discount" value="{{$table->discount ?? 0}}" required>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Additional Charge</span>
                <input type="number"  name="adCharge" class="form-control" step="any" min="0"  placeholder="Additional Charge" value="{{$table->adCharge ?? 0}}" required>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Approximate Ending Date</span>
                @php
                    if(isset($table)){

                        if($table->endDate != ''){
                            $endDate = pub_date($table->endDate);
                        }else{
                            $endDate = '';
                        }

                    }
                @endphp
                <input type="text" name="endDate" class="form-control date_pic" placeholder="Approximate Ending Date" value="{{$endDate ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Date</span>
                @php
                    if(isset($table)){

                        if($table->created_at != ''){
                            $created_at = pub_date($table->created_at);
                        }else{
                            $created_at = '';
                        }

                    }
                @endphp
                <input type="text" name="created_at" class="form-control date_pic" placeholder="Change Date" value="{{$created_at ?? ''}}">
            </div>
        </div>

        <div class="form-group mt-10 mb-5">

            <label class="control-label col-lg-12 text-bold">Notes</label>
            <div class="col-lg-12">
                <textarea name="note" class="form-control" cols="2" placeholder="Write Note About S/He ....">{{$table->note ?? ''}}</textarea>
            </div>
        </div>

    </div>
</div>