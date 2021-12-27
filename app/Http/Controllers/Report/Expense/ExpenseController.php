<?php

namespace App\Http\Controllers\Report\Expense;

use App\Branch;
use App\InExp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function index()
    {
        $table = InExp::select('category')->where('category', '<>', null)->where('sector', 'Expense')->get()->unique('category');
        $branch = Branch::orderBy('name', 'ASC')->get();
        return view('reports.expense.expense')->with(['table' => $table, 'branch' => $branch]);
    }


    public function show(Request $request){

        //dd($request->all());
        $date_rang = date_time_range($request->dateRang);
        $pre_table = InExp::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->where('trType','OUT');
        if($request->filled('category')){
            $pre_table->where('category', $request->category);
        }

        if($request->filled('branchID')){
            $pre_table->where('branchID', $request->branchID);
        }
        $table = $pre_table->get();

        return view('print.report.expense.expense')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }
}
