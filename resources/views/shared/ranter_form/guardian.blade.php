<div class="row">
    <div class="col-md-6">
        <h4>First Guardian</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Guardian Name <span class="text-danger">*</span></span>
                <input type="text" name="guardian" class="form-control" required="required" placeholder="Guardian Name" value="{{$table->guardian ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Relation</span>
                <input type="text" list="relationss" name="relations" class="form-control" placeholder="Relation Guardian" autocomplete="off" value="{{$table->relations ?? ''}}">
                <datalist id="relationss">
                    @foreach($relations as $row)
                        <option value="{{$row->relations}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Contact</span>
                <input type="text" name="guardianContact" class="form-control" placeholder="Guardian Contact" value="{{$table->guardianContact ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Occupation</span>
                <input type="text"  list="guardianOccupations" name="guardianOccupation" class="form-control" placeholder="Guardian Occupation" autocomplete="off" value="{{$table->guardianOccupation ?? ''}}">
                <datalist id="guardianOccupations">
                    @foreach($guardianOccupation as $row)
                        <option value="{{$row->guardianOccupation}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">NID</span>
                <input type="text" name="guardianNid" class="form-control" placeholder="Guardian NID" value="{{$table->guardianNid ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Address</span>
                <input type="text" name="guardianAddress" class="form-control" placeholder="Guardian Address" value="{{$table->guardianAddress ?? ''}}">
            </div>
        </div>

        <div class="form-group mt-10 mb-5">

            <label class="control-label col-lg-12 text-bold">Guardian Photo</label>
            <div class="col-lg-12">
                <input id="guardianPhoto" type="file" name="guardianPhoto" placeholder="Guardian Photo" accept="image/*">
            </div>
        </div>

        <div class="text-center">
            <img class="img-thumbnail guardianPhoto" src="{{asset('public/ranter/')}}/{{$table->guardianPhoto ?? ''}}" style="height: 150px;" alt="Guardian Photo">
        </div>

    </div>
    <div class="col-md-6">
        <h4>Local Guardian</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Guardian Name</span>
                <input type="text" name="guardianLoc" class="form-control" placeholder="Guardian Name" value="{{$table->guardianLoc ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Relation</span>
                <input type="text" list="relationsLocs" name="relationsLoc" class="form-control" placeholder="Relation Guardian" autocomplete="off" value="{{$table->relationsLoc ?? ''}}">
                <datalist id="relationsLocs">
                    @foreach($relationsLoc as $row)
                        <option value="{{$row->relationsLoc}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Contact</span>
                <input type="text" name="guardianContactLoc" class="form-control" placeholder="Guardian Contact" value="{{$table->guardianContactLoc ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Occupation</span>
                <input type="text"  list="guardianOccupationLocs" name="guardianOccupationLoc" class="form-control" placeholder="Guardian Occupation" autocomplete="off" value="{{$table->guardianOccupationLoc ?? ''}}">
                <datalist id="guardianOccupationLocs">
                    @foreach($guardianOccupation as $row)
                        <option value="{{$row->guardianOccupation}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">NID</span>
                <input type="text" name="guardianNidLoc" class="form-control" placeholder="Guardian NID" value="{{$table->guardianNidLoc ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Address</span>
                <input type="text" name="guardianAddressLoc" class="form-control" placeholder="Guardian Address" value="{{$table->guardianAddressLoc ?? ''}}">
            </div>
        </div>

        <div class="form-group mt-10 mb-5">

            <label class="control-label col-lg-12 text-bold">Guardian Photo</label>
            <div class="col-lg-12">
                <input id="guardianPhotoLoc" type="file" name="guardianPhotoLoc" placeholder="Guardian Photo" accept="image/*">
            </div>
        </div>

        <div class="text-center">
            <img class="img-thumbnail guardianPhotoLoc" src="{{asset('public/ranter/')}}/{{$table->guardianPhotoLoc ?? ''}}" style="height: 150px;" alt="Guardian Photo">
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4>Second Guardian</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Guardian Name</span>
                <input type="text" name="guardian1" class="form-control" placeholder="Guardian Name" value="{{$table->guardian1 ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Relation</span>
                <input type="text" list="relations1s" name="relations1" class="form-control" placeholder="Relation Guardian" autocomplete="off" value="{{$table->relations1 ?? ''}}">
                <datalist id="relations1s">
                    @foreach($relations1 as $row)
                        <option value="{{$row->relations1}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Contact</span>
                <input type="text" name="guardian1Contact" class="form-control" placeholder="Guardian Contact" value="{{$table->guardian1Contact ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Occupation</span>
                <input type="text"  list="guardian1Occupations" name="guardian1Occupation" class="form-control" placeholder="Guardian Occupation" autocomplete="off" value="{{$table->guardian1Occupations ?? ''}}">
                <datalist id="guardian1Occupations">
                    @foreach($guardianOccupation as $row)
                        <option value="{{$row->guardianOccupation}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">NID</span>
                <input type="text" name="guardian1Nid" class="form-control" placeholder="Guardian NID" value="{{$table->guardian1Nid ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Address</span>
                <input type="text" name="guardian1Address" class="form-control" placeholder="Guardian Address" value="{{$table->guardian1Address ?? ''}}">
            </div>
        </div>

        <div class="form-group mt-10 mb-5">

            <label class="control-label col-lg-12 text-bold">Guardian Photo</label>
            <div class="col-lg-12">
                <input id="guardian1Photo" type="file" name="guardian1Photo" placeholder="Guardian Photo" accept="image/*">
            </div>
        </div>

        <div class="text-center">
            <img class="img-thumbnail guardian1Photo" src="{{asset('public/ranter/')}}/{{$table->guardian1Photo ?? ''}}" style="height: 150px;" alt="Guardian Photo">
        </div>

    </div>
    <div class="col-md-6"></div>
</div>
