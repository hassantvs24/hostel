<?php

namespace App\Http\Controllers\Report;

use App\Cashbook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function index(){
        return view('reports.overview');
    }

    public function balance(Request $request){
        $date_rang = date_time_range($request->dateRang);

        //dd($request->sector);
        if(isset($request->sector)){
            $table = Cashbook::whereIn('sector',$request->sector)->whereBetween('created_at', [$date_rang[0], $date_rang[1]])->get();
            return view('print.report.overview')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
        }else{
            return redirect()->back()->with(config('naz.not_happen'));
        }

    }
}
