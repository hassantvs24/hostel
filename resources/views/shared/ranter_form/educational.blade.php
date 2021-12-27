<div class="row">
    <div id="ssc" class="col-md-6" style="display: none;">
        <h4>School/SSC Information</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">School</span>
                <input type="text" list="schools" name="school" class="form-control" placeholder="Name Of School" autocomplete="off" value="{{$table->school ?? ''}}">
                <datalist id="schools">
                    @foreach($school as $row)
                        <option value="{{$row->school}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Group</span>
                <input type="text" list="groupSSC" name="groupSSC" class="form-control" placeholder="Group" autocomplete="off" value="{{$table->groupSSC ?? ''}}">
                <datalist id="groupSSC">
                    @foreach($group as $row)
                        <option value="{{$row->groupSSC}}">
                    @endforeach
                </datalist>
            </div>
        </div>


        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Class</span>
                <input type="text" name="classSSC" class="form-control" placeholder="Class Name" value="{{$table->classSSC ?? ''}}">
            </div>
        </div>


        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Class Roll</span>
                <input type="text" name="rollSSC" class="form-control" placeholder="Class Roll" value="{{$table->rollSSC ?? ''}}">
            </div>
        </div>


        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Section</span>
                <input type="text" name="sectionSSC" class="form-control" placeholder="Class Section" value="{{$table->sectionSSC ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Class Time</span>
                <input type="text" name="classTimeSSC" class="form-control" placeholder="Class Time" value="{{$table->classTimeSSC ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Board</span>
                <input type="text" list="boardSSC" name="boardSSC" class="form-control" placeholder="Board" autocomplete="off" value="{{$table->boardSSC ?? ''}}">
                <datalist id="boardSSC">
                    @foreach($board as $row)
                        <option value="{{$row->boardSSC}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Pass Year</span>
                <input type="number" min="4" name="passYearSSC" class="form-control" placeholder="Pass Year" value="{{$table->passYearSSC ?? ''}}">
            </div>
        </div>

    </div>


    <div id="hsc" class="col-md-6" style="display: none;">
        <h4>College/HSC Information</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">College</span>
                <input type="text" list="college" name="college" class="form-control" placeholder="Name Of College" autocomplete="off" value="{{$table->college ?? ''}}">
                <datalist id="college">
                    @foreach($college as $row)
                        <option value="{{$row->college}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Group</span>
                <input type="text" list="groupHSC" name="groupHSC" class="form-control" placeholder="Group" autocomplete="off" value="{{$table->groupHSC ?? ''}}">
                <datalist id="groupHSC">
                    @foreach($group as $row)
                        <option value="{{$row->groupSSC}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Roll Number</span>
                <input type="text" name="rollHSC" class="form-control" placeholder="Roll Number" value="{{$table->rollHSC ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Session</span>
                <input type="text" name="sessionHSC" class="form-control" placeholder="Session" value="{{$table->sessionHSC ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Board</span>
                <input type="text" list="boardHSC" name="boardHSC" class="form-control" placeholder="Board" autocomplete="off" value="{{$table->boardHSC ?? ''}}">
                <datalist id="boardHSC">
                    @foreach($board as $row)
                        <option value="{{$row->boardSSC}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Pass Year</span>
                <input type="number" min="4" name="passYearHSC" class="form-control" placeholder="Pass Year" value="{{$table->passYearHSC ?? ''}}">
            </div>
        </div>

    </div>


    <div id="hns" class="col-md-6" style="display: none;">
        <h4>Honours Information</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">University</span>
                <input type="text" list="universityHons" name="universityHons" class="form-control" placeholder="Name Of University" autocomplete="off" value="{{$table->universityHons ?? ''}}">
                <datalist id="universityHons">
                    @foreach($university as $row)
                        <option value="{{$row->universityHons}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Subject</span>
                <input type="text" id="subjectHonss" name="subjectHons" class="form-control" placeholder="Subject" autocomplete="off" value="{{$table->subjectHons ?? ''}}">
                <datalist id="subjectHonss">
                    @foreach($universitySubject as $row)
                        <option value="{{$row->subjectHons}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Semester</span>
                <input type="text" name="semesterHons" class="form-control" placeholder="Semester" value="{{$table->semesterHons ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Student ID</span>
                <input type="text" name="studentIDHons" class="form-control" placeholder="Student ID" value="{{$table->studentIDHons ?? ''}}">
            </div>
        </div>


        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Year</span>
                <input type="number" min="1" name="yearsHons" class="form-control" placeholder="Year" value="{{$table->yearsHons ?? ''}}">
            </div>
        </div>

    </div>


    <div id="ms" class="col-md-6" style="display: none;">
        <h4>Master's Information</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">University</span>
                <input list="universityMS" type="text" name="universityMS" class="form-control" placeholder="Name Of University" autocomplete="off" value="{{$table->universityMS ?? ''}}">
                <datalist id="universityMS">
                    @foreach($university as $row)
                        <option value="{{$row->university}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Subject</span>
                <input type="text" name="subjectMS" class="form-control" placeholder="Subject" value="{{$table->subjectMS ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Semester</span>
                <input type="text" name="semesterMS" class="form-control" placeholder="Semester" value="{{$table->semesterMS ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Student ID</span>
                <input type="text" name="studentIDMS" class="form-control" placeholder="Student ID" value="{{$table->studentIDMS ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Year</span>
                <input type="number" min="1" name="yearsMS" class="form-control" placeholder="Year" value="{{$table->yearsMS ?? ''}}">
            </div>
        </div>

    </div>

    <div id="coach" class="col-md-6" style="display: none;">
        <h4>Other Course Information</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Institute</span>
                <input type="text" list="institutes" name="institute" class="form-control" placeholder="Name Of Institute" autocomplete="off" value="{{$table->institute ?? ''}}">
                <datalist id="institutes">
                    @foreach($institute as $row)
                        <option value="{{$row->institute}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Course Name</span>
                <input type="text" name="subjectCo" class="form-control" placeholder="Course Name" value="{{$table->subjectCo ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Class Time</span>
                <input type="text" name="classTimeCo" class="form-control" placeholder="Class Time" value="{{$table->classTimeCo ?? ''}}">
            </div>
        </div>

    </div>


    <div id="jobs" class="col-md-6" style="display: none;">
        <h4>Job Information</h4>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Company</span>
                <input type="text" list="companys" name="company" class="form-control" placeholder="Name Of Company" autocomplete="off" value="{{$table->company ?? ''}}">
                <datalist id="companys">
                    @foreach($company as $row)
                        <option value="{{$row->company}}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Employee ID</span>
                <input type="text" name="employeeID" class="form-control" placeholder="Employee ID" value="{{$table->employeeID ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Designation</span>
                <input type="text" name="designation" class="form-control" placeholder="Designation" value="{{$table->designation ?? ''}}">
            </div>
        </div>

        <div class="form-group mb-5">
            <div class="input-group">
                <span class="input-group-addon">Office Location</span>
                <input type="text" name="officeLocation" class="form-control" placeholder="Office Location" value="{{$table->officeLocation ?? ''}}">
            </div>
        </div>


    </div>


</div>
