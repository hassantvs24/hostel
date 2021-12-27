<?php

namespace App\Http\Controllers\Collections;

use App\Cashbook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionLedgerController extends Controller
{
    public function index(){
        $table = Cashbook::orderBy('created_at','DESC')->where('sector', 'Collection')->where('transactionType', 'IN')->get();
        return view('collections.ledger')->with(['table' => $table]);
    }

    public function edit(Request $request){
        $table = Cashbook::find($request->cashbookID);
        $table->amountIN = $request->amount;
        $table->remark = $request->remark;
        $table->accounts = $request->accounts;
        $table->created_at = db_date($request->created_at).' '.date('H:i:s');
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }

    public function del($id){
        $table = Cashbook::find($id);
        $table->delete();

        return redirect()->back()->with(config('naz.del'));
    }
}
