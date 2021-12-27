<?php

namespace App\Http\Controllers\Report\Collection;

use App\Branch;
use App\Cashbook;
use App\Ranter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index(){
        $ranter = Ranter::orderBy('name','ASC')->get();
        $branch = Branch::orderBy('name', 'ASC')->get();
        return view('reports.collection.collection')->with(['ranter'=>$ranter, 'branch' => $branch]);
    }

    public function daily_Report(Request $request)
    {
        //dd($request->all());
        $date_rang = date_time_range($request->dateRang);
        $table_pre = Cashbook::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->where('sector', 'Collection')->where('transactionType', 'IN');
            if($request->has('remark')){
                $table_pre->whereIN('remark', $request->remark);
            }
            if($request->branchID != ''){
                $table_pre->where('branchID', $request->branchID);
            }
        $table = $table_pre->get();
        return view('print.report.collection.daily_collection')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }
    

    public function ranter_wise(Request $request)
    {
        $ranter = Ranter::find($request->ranterID);
        $date_rang = date_time_range($request->dateRang);
        $table = Cashbook::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->where('sector', 'Collection')->where('transactionType', 'IN')->where('refID', $request->ranterID)->get();
        return view('print.report.collection.ranter_wise')->with(['table' => $table, 'date_rang' =>  $request->dateRang,'ranter'=>$ranter]);
    }

    public function due(Request $request){
        $table = Ranter::orderBy('created_at','DESC')->get();
        if ($request->branchID == ''){
            $branch = 'All';
        }else{
            $brasnchs = Branch::find($request->branchID);
            $branch = $brasnchs->name;
        }
        return view('print.report.collection.due')->with(['table'=>$table, 'branch' => $branch]);
    }
}
