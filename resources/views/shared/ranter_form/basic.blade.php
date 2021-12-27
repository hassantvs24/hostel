<div class="row">
    <div class="col-md-6">

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Type of Renter <span class="text-danger">*</span></span>
                <select id="ranterType" name="ranterType" class="form-control"  required="required">
                    @if(!isset($table))
                        <option value="" selected="" disabled=""> Select an Option</option>
                        <option value="School">School</option>
                        <option value="College">College</option>
                        <option value="Coaching">Coaching</option>
                        <option value="Honours">Honours</option>
                        <option value="Masters">Masters</option>
                        <option value="MBA">MBA</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Job">Job Holder</option>
                    @else
                        <option value="" disabled="" {{ $table->ranterType == null ? "selected" : "" }}> Select an Option</option>
                        <option value="School" {{ $table->ranterType == "School" ? "selected" : "" }}>School</option>
                        <option value="College" {{ $table->ranterType == "College" ? "selected" : "" }}>College</option>
                        <option value="Coaching" {{ $table->ranterType == "Coaching" ? "selected" : "" }}>Coaching</option>
                        <option value="Honours" {{ $table->ranterType == "Honours" ? "selected" : "" }}>Honours</option>
                        <option value="Masters" {{ $table->ranterType == "Masters" ? "selected" : "" }}>Masters</option>
                        <option value="MBA" {{ $table->ranterType == "MBA" ? "selected" : "" }}>MBA</option>
                        <option value="Diploma" {{ $table->ranterType == "Diploma" ? "selected" : "" }}>Diploma</option>
                        <option value="Job" {{ $table->ranterType == "Job" ? "selected" : "" }}>Job Holder</option>
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Name <span class="text-danger">*</span></span>
                <input type="text" name="name" class="form-control"  required="required" placeholder="Name" value="{{$table->name ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Birth Day</span>
                @php
                    if(isset($table)){

                        if($table->dob != ''){
                            $dob = pub_date($table->dob);
                        }else{
                            $dob = '';
                        }

                    }
                @endphp
                <input type="text" name="dob" class="form-control dob" placeholder="Birth Day" value="{{$dob ?? ''}}">
            </div>
        </div>


        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Contact <span class="text-danger">*</span></span>
                <input type="text" name="contact" class="form-control"  required="required" placeholder="Contact" value="{{$table->contact ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$table->email ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Nationality</span>
                <input type="text" name="nationality" class="form-control" placeholder="Nationality" value="{{$table->nationality ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">NID</span>
                <input type="text" name="nid" class="form-control" placeholder="National ID Card" autocomplete="off" value="{{$table->nid ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Birth Register</span>
                <input type="text" name="birth_register" class="form-control" placeholder="Birth Register" autocomplete="off" value="{{$table->birth_register ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Passport</span>
                <input type="text" name="passport" class="form-control" placeholder="Passport" autocomplete="off" value="{{$table->passport ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Address</span>
                <input type="text" name="address" class="form-control" placeholder="Address" value="{{$table->address ?? ''}}">
            </div>
        </div>



    </div>

    <div class="col-md-6">

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Religion</span>
                <select name="religion" class="form-control">

                    @if(!isset($table))
                        <option value="" selected="" disabled=""> Select an Option</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddhist">Buddhist</option>
                        <option value="Christian">Christian</option>
                        <option value="Jewish">Jewish</option>
                        <option value="Agnostic">Agnostic</option>
                        <option value="Atheist">Atheist</option>
                        <option value="Other">Other</option>
                    @else
                        <option value="" disabled="" {{ $table->religion == null ? "selected" : "" }}> Select an Option</option>
                        <option value="Islam" {{ $table->religion == "Islam" ? "selected" : "" }}>Islam</option>
                        <option value="Hindu" {{ $table->religion == "Hindu" ? "selected" : "" }}>Hindu</option>
                        <option value="Buddhist" {{ $table->religion == "Buddhist" ? "selected" : "" }}>Buddhist</option>
                        <option value="Christian" {{ $table->religion == "Christian" ? "selected" : "" }}>Christian</option>
                        <option value="Jewish" {{ $table->religion == "Jewish" ? "selected" : "" }}>Jewish</option>
                        <option value="Agnostic" {{ $table->religion == "Agnostic" ? "selected" : "" }}>Agnostic</option>
                        <option value="Atheist" {{ $table->religion == "Atheist" ? "selected" : "" }}>Atheist</option>
                        <option value="Other" {{ $table->religion == "Other" ? "selected" : "" }}>Other</option>
                    @endif

                </select>
            </div>
        </div>


        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Blood Group</span>
                <select name="bloodGroup" class="form-control">

                    @if(!isset($table))
                        <option value="" selected="" disabled=""> Select an Option</option>
                        <option value="O+">O+</option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="O-">O-</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                    @else
                        <option value="" disabled="" {{ $table->bloodGroup == null ? "selected" : "" }}> Select an Option</option>
                        <option value="O+" {{ $table->bloodGroup == "O+" ? "selected" : "" }}>O+</option>
                        <option value="A+" {{ $table->bloodGroup == "A+" ? "selected" : "" }}>A+</option>
                        <option value="B+" {{ $table->bloodGroup == "B+" ? "selected" : "" }}>B+</option>
                        <option value="AB+" {{ $table->bloodGroup == "AB+" ? "selected" : "" }}>AB+</option>
                        <option value="O-" {{ $table->bloodGroup == "O-" ? "selected" : "" }}>O-</option>
                        <option value="A-" {{ $table->bloodGroup == "A-" ? "selected" : "" }}>A-</option>
                        <option value="B-" {{ $table->bloodGroup == "B-" ? "selected" : "" }}>B-</option>
                        <option value="AB-" {{ $table->bloodGroup == "AB-" ? "selected" : "" }}>AB-</option>

                    @endif

                </select>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Marital Status</span>
                <select name="maritalStatus" class="form-control">
                    @if(!isset($table))
                        <option value="" selected="" disabled=""> Select an Option</option>
                        <option value="Unmarried">Unmarried</option>
                        <option value="Married">Married</option>
                    @else
                        <option value="" disabled="" {{ $table->maritalStatus == null ? "selected" : "" }}> Select an Option</option>
                        <option value="Unmarried" {{ $table->maritalStatus == "Unmarried" ? "selected" : "" }}>Unmarried</option>
                        <option value="Married" {{ $table->maritalStatus == "Married" ? "selected" : "" }}>Married</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Occupation</span>
                <input type="text" list="occupations"  name="occupation" class="form-control" placeholder="Occupation" autocomplete="off" value="{{$table->occupation ?? ''}}">
                <datalist id="occupations">
                    @foreach($occupation as $row)
                        <option value="{{$row->occupation}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mt-20 mb-5">

            <label class="control-label col-lg-12 text-bold">Photo</label>
            <div class="col-lg-12">
                <input id="inputFile" type="file" name="photo" placeholder="Photo" accept="image/*">
            </div>
        </div>

        <div class="text-center">
            <img class="img-thumbnail photo_prev" src="{{asset('public/ranter/')}}/{{$table->photo ?? ''}}" style="height: 150px;" alt="Photo">
        </div>


    </div>
</div>


									