@extends('layouts.master')

@section('title')
    Overview Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Cash Balance</h6>
                </div>
                <form action="{{action('Report\OverviewController@balance')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon">Select Date Range</span>
                            <input class="form-control date_rang_pick" name="dateRang" placeholder="Pick Date" type="text">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mt-15 text-bold text-muted">Select Department</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><input id="bi" type="checkbox" name="sector[]" value="Billing" checked> <label for="bi">Billing</label></p>
                                <p><input id="co" type="checkbox" name="sector[]" value="Collection" checked> <label for="co">Collection</label></p>
                            </div>
                            <div class="col-xs-4">
                                <p><input id="in" type="checkbox" name="sector[]" value="Income" checked> <label for="in">Income</label></p>
                                <p><input id="ex" type="checkbox" name="sector[]" value="Expense" checked> <label for="ex">Expense</label></p>
                            </div>
                            <div class="col-xs-4">
                                <p><input id="sc" type="checkbox" name="sector[]" value="Security" checked> <label for="sc">Security</label></p>
                                <p><input id="ad" type="checkbox" name="sector[]" value="Admission" checked> <label for="ad">Admission</label></p>
                            </div>
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

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>


    <script type="text/javascript">

        $(function () {
            $('.select2').select2();
        });

        $(function () {
            $('.date_rang_pick').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $(function () {
            $('.date_pick').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });


    </script>

@endsection

