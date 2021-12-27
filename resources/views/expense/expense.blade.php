@extends('layouts.master')
@extends('box.expense.expense')
@section('title')
    Expense
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Expense</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Expense</h6>
                </div>

                <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Source</th>
                            <th>Amount</th>
                            <th>Branch</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->category}}</td>
                                <td>{{$row->source}}</td>
                                <td>{{$row->amountOUT}}</td>
                                <td>{{$row->branch['name'] ?? ''}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-description="{{$row->description}}" data-branch="{{$row->branchID}}" data-source="{{$row->source}}" data-category="{{$row->category}}" data-amount="{{$row->amountOUT}}" data-id="{{$row->inExpID}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Expense\ExpenseController@del', ['id' => $row->inExpID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript">


        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var source = $(this).data('source');
                var category = $(this).data('category');
                var amount = $(this).data('amount');
                var branchID = $(this).data('branch');
                var description = $(this).data('description');

                $('#ediID').val(id);
                $('#ediModal [name=source]').val(source);
                $('#ediModal [name=category]').val(category);
                $('#ediModal [name=amountOUT]').val(amount);
                $('#ediModal [name=branchID]').val(branchID);
                $('#ediModal [name=description]').val(description);

            });
        });

        $(function () {
            $('.date_pic').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [5] }//For Column Order
                ]
            });

        });


    </script>

@endsection
