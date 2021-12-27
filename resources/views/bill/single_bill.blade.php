@extends('layouts.general')
@extends('box.bill.bill')
@section('title')
    List
@endsection

@section('back-url')

    <div class="col-md-6">
        <a class="btn bg-info-700 btn-labeled" href="{{action('Billing\NewBillingController@index')}}" title="back"><b><i class="icon-arrow-left16"></i></b> Back</a>
    </div>
    <div class="col-md-6 text-right">
        <button class="btn bg-teal-700 btn-labeled mr-5" id="bill_gen" type="button" onclick="confirm('Are you sure to Bill Generate?')" title="Bill Generate"><b><i class="icon-cogs"></i></b> Bill Generate</button>
        <a class="btn bg-slate-700 btn-labeled ml-5" href="{{action('Billing\NewBillingController@bill_slip',['id' => $table->billNameID])}}" title="View Billing Sheet"><b><i class="icon-printer2"></i></b> Billing Sheet</a>
    </div>

@endsection

@section('content')
    <div class="row mt-10">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><strong>{{$table->name}} </strong>Details [{{pub_date($table->created_at)}}]</h4>
                </div>

                <div class="panel-body">
                    <form id="bill_gen_form" action="{{action('Billing\NewBillingController@bill_generate')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="billNameID" value="{{$table->billNameID}}">
                        <input type="hidden" name="billName" value="{{$table->name}}">
                        <table class="table table-bordered table-condensed table-hover table-striped mb-10">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Ranter</th>
                                <th>Contact</th>
                                <th>Seat No.</th>
                                <th>Branch</th>
                                <th>Add. Charge</th>
                                <th>Discount</th>
                                <th class="text-right">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seat as $row)
                                @php
                                  $bill =  $row->check($row->seatID,$table->billNameID);
                                @endphp
                                <tr>
                                    <td class="white_sp">
                                        @if($bill== null)
                                        <input class="form-control" type="checkbox" name="seatID[]" value="{{$row->seatID}}" checked="checked" />
                                        @else
                                         <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" type="button" data-id="{{$bill->billingID}}" data-discount="{{$bill->discount}}" data-adcharge="{{$bill->adCharge}}" data-amount="{{$bill->amount}}"  data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                         <a class="btn btn-xs btn-danger no-padding" href="{{action('Billing\NewBillingController@bill_del',['id' => $bill->billingID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                        @endif
                                    </td>
                                    <td>{{$row->ranter['name']}}</td>
                                    <td>{{$row->ranter['contact']}}</td>
                                    <td>{{$row->seatNumber}}</td>
                                    <td>{{$row->branch['name']}}</td>
                                    <td>
                                        <div class="form-group m-0">
                                            @if($bill== null)
                                            <input type="number" name="adCharge[{{$row->seatID}}]" value="{{$row->ranter['adCharge']}}" step="any" min="0"  required/>
                                            @else
                                                {{$bill->adCharge}}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group m-0">
                                            @if($bill== null)
                                            <input type="number" name="discount[{{$row->seatID}}]" value="{{$row->ranter['discount']}}" step="any" min="0"  required/>
                                            @else
                                                {{$bill->discount}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-right">
                                            <div class="form-group m-0">
                                                @if($bill== null)
                                                <input type="number" name="bill[{{$row->seatID}}]" value="{{$row->amount}}" step="any" min="0"  required/>
                                                @else
                                                    {{$bill->amount}}
                                                @endif
                                            </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


    <script type="text/javascript">

        $(function () {
            $('#bill_gen').click(function () {
                $('#bill_gen_form').submit();
            });
        });

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var discount = $(this).data('discount');
                var adcharge = $(this).data('adcharge');
                var amount = $(this).data('amount');

                $('#ediID').val(id);
                $('#ediModal [name=discount]').val(discount);
                $('#ediModal [name=adCharge]').val(adcharge);
                $('#ediModal [name=amount]').val(amount);

            });
        });


        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [7] }//For Column Order
                ]
            });
        });

    </script>

@endsection
