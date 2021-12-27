<?php

namespace App\Http\Controllers\Branch;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    public function index(){
        $table = Branch::orderBy('created_at', 'DESC')->get();
        return view('branch.branch')->with(['table' => $table]);
    }


    public function save(Request $request){
        $maxValue = Branch::max('serialNo');
        $table = new Branch();
        $table->serialNo = ($maxValue + 1);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('naz.save'));
    }


    public function edit(Request $request){
        $table = Branch::find($request->id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('naz.edit'));
    }


    public function del($id){
        $table = Branch::find($id);
        if($table->productCode == Auth::user()->productCode) {
        $table->delete();

        return redirect()->back()->with(config('naz.del'));

        }else{
            return view('errors.404');
        }
    }


}
