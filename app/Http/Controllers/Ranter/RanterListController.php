<?php

namespace App\Http\Controllers\Ranter;

use App\Ranter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RanterListController extends Controller
{
    public function index(){
        $table = Ranter::orderBy('created_at','DESC')->get();
        return view('ranter.ranter_list')->with(['table' => $table]);
    }

    public function show($id){
        $table = Ranter::find($id);
        if($table->productCode == Auth::user()->productCode) {

            return view('print.ranter.ranter_details')->with(['table' => $table]);

        }else{
            return view('errors.404');
        }
    }


    public function status($id){
        $table = Ranter::find($id);
        $status = $table->status;
        if($status == 'Active'){
            $table->status = 'Inactive';
        }else{
            $table->status = 'Active';
        }
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }
}
