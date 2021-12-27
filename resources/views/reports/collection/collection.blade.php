@extends('layouts.master')
@section('title')
    Collection Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Daily Reports</h6>
                </div>
                <form action="{{action('Report\Collection\CollectionController@daily_Report')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">

                        <div class="input-group mb-15">
                            <span class="input-group-addon">Branch</span>
                            <select class="form-control select2" name="branchID">
                                <option value="">Select Branch (Optional)</option>
                                @foreach($branch as $row)
                                    <option value="{{$row->branchID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Select Date Range</span>
                            <input class="form-control date_rang_pick" name="dateRang" placeholder="Pick Date" type="text">
                        </div><br>
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input name="remark[]" type="checkbox" value="Cash"> Cash
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remark[]" type="checkbox" value="Bank"> Bank
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remark[]" type="checkbox" value="bKash"> bKash
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <div class="heading-btn pull-right">
                                <button type="submit" class="btn btn-info"><i class="icon-stats-bars2"></i> Next</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Ranter wise Reports</h6>
                </div>
                <form action="{{action('Report\Collection\CollectionController@ranter_wise')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">

                        <div class="input-group">
                            <span class="input-group-addon">Select Ranter</span>
                            <select class="form-control select2" name="ranterID" required>
                                <option value="">Select Ranter</option>
                                @foreach($ranter as $row)
                                <option value="{{$row->ranterID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Select Date Range</span>
                            <input class="form-control date_rang_pick1" name="dateRang" placeholder="Pick Date" type="text">
                        </div>


                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <div class="heading-btn pull-right">
                                <!--<button type="reset" class="btn btn-default"><i class="icon-reset"></i> Reset</button>-->
                                <button type="submit" class="btn btn-info"><i class="icon-stats-bars2"></i> Next</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Due Report</h6>
                </div>
                <form action="{{action('Report\Collection\CollectionController@due')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">
                        <div class="input-group mb-15">
                            <span class="input-group-addon">Branch</span>
                            <select class="form-control select2" name="branchID">
                                <option value="">Select Branch (Optional)</option>
                                @foreach($branch as $row)
                                    <option value="{{$row->branchID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <div class="heading-btn pull-right">
                                <!--<button type="reset" class="btn btn-default"><i class="icon-reset"></i> Reset</button>-->
                                <button type="submit" class="btn btn-info"><i class="icon-stats-bars2"></i> Next</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
        });

        $(function () {
            $('.date_rang_pick').daterangepicker({
                opens:'right',
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

            $('.date_rang_pick1').daterangepicker({
                opens:'left',
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

    </script>
@endsection
