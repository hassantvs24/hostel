@section('box')

    <!-- Basic Edi modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Update Company/Business Information</h5>
                </div>

                <form action="{{action('Company\CompanyController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="companyCheck" name="companyCheck" value="{{($company == null ? 0 : $company->count())}}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Company Name</span>
                                        <input class="form-control" name="name" placeholder="Company/Business Name.." type="text" value="{{$company->name ?? ''}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Mobile</span>
                                        <input class="form-control" name="mobile" placeholder="Mobile No.." type="text" value="{{$company->mobile ?? ''}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Email</span>
                                        <input class="form-control" name="email" placeholder="Email.." type="email" value="{{$company->email ?? Auth::user()->email}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Address</span>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Adress.."  type="text">{{$company->address ?? ''}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Owner</span>
                                        <input class="form-control" name="owner" placeholder="Owner Name.." value="{{$company->owner ?? Auth::user()->name}}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Phone</span>
                                        <input class="form-control" name="phone" placeholder="Phone.." value="{{$company->phone ?? ''}}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Website</span>
                                        <input class="form-control" name="website" placeholder="Website.." value="{{$company->website ?? ''}}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Company Logo</label>
                                    <div class="col-lg-9">
                                        <input name="logo" id="inputFile" placeholder="Company Logo" type="file" accept="image/*">
                                    </div>
                                </div><br>
                                <div class="text-center">
                                    <img class="img-thumbnail preview" src="{{asset('public/logo/')}}/{{$company->logo ?? ''}}" style="height: 150px;" type="Company Logo" alt="Company Logo">
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
    <!-- /basic Edi modal -->


    <div id="codexModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-regexp"></i> Update Software Pin Code</h5>
                </div>

                <form action="{{action('Dashboard\DashboardController@codex')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" name="productCode" value="{{Auth::user()->productCode}}">

                    <div class="modal-body">
                        @if($key != '')
                            @php
                                $exp = date('d/m/Y', $key);
                            @endphp
                            @if(remain_day($exp) >= 0)
                            <p class="text-muted text-center">This product will be expired on <span class="text-success">{{$exp}}</span>.
                                Day Remaining: <strong class="text-danger">{{remain_day($exp)}}</strong></p>
                            @else
                                <p class="text-muted text-center">This product already expired on <span class="text-danger">{{$exp}}</span>.
                            @endif
                        @endif

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pin Code:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="pin" placeholder="Pin Code" type="text" required>
                            </div>
                        </div><br>
                            <div class="text-center text-muted">{{ isset(Auth::user()->productCode) ? Auth::user()->productCode : 'Product Code' }}</div>


                    </div><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

