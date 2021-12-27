@extends('layouts.master')
@section('title')
    Ranter List
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Ranter List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Address</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->serialNo}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->contact}}</td>
                                <td>{{$row->ranterType}}</td>
                                <td>{{$row->address}}</td>
                                <td class="text-right white_sp">
                                    <a class="btn btn-xs {{($row->status == 'Active' ? 'btn-success' : 'btn-danger')}} no-padding mr-5" href="{{action('Ranter\RanterListController@status', ['id' => $row->ranterID])}}" title="Change Status"><i class="icon-stars"></i></a>
                                    <a class="btn btn-xs btn-info no-padding mr-5" href="{{action('Ranter\RanterListController@show', ['id' => $row->ranterID])}}" title="View"><i class="icon-eye"></i></a>
                                    <a class="btn btn-xs btn-success no-padding mr-5" href="{{action('Ranter\NewRanterController@index', ['id' => $row->ranterID])}}" title="Edit"><i class="icon-pencil5"></i></a>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Ranter\NewRanterController@del', ['id' => $row->ranterID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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


    <script type="text/javascript">


        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [6] }//For Column Order
                ]
            });
        });

    </script>

@endsection