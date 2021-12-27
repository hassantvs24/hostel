<?php

namespace App\Http\Controllers\Report;

use App\Ranter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RanterController extends Controller
{

    public function index(){
        return view('reports.ranter');
    }

    public function ending(Request $request){
        $date_rang = date_range($request->dateRang);
        $table = Ranter::whereBetween('endDate', [$date_rang[0], $date_rang[1]])->get();
        return view('print.report.ranter')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }


}
