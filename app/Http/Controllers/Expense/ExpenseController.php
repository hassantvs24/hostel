<?php

namespace App\Http\Controllers\Expense;

use App\Branch;
use App\Cashbook;
use App\InExp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index(){
        $table = InExp::where('sector', 'Expense')->get();
        $category = InExp::select('category')->where('category', '<>', null)->where('sector', 'Expense')->get()->unique('category');
        $source = InExp::select('source')->where('source', '<>', null)->where('sector', 'Expense')->get()->unique('source');
        $branch = Branch::orderBy('name', 'ASC')->get();

        return view('expense.expense')->with(['table' => $table, 'category' => $category, 'source' => $source, 'branch' => $branch]);
    }


    public function save(Request $request){
        if($request->amountOUT > 0){
            DB::beginTransaction();
            try {
                $maxValue = InExp::max('serialNo');
                $table = new InExp();
                $table->serialNo = $maxValue +1;
                $table->category = $request->category;
                $table->source = $request->source;
                $table->amountOUT = $request->amountOUT;
                $table->sector = 'Expense';
                $table->trType = 'OUT';
                $table->branchID = $request->branchID;
                $table->description = $request->description;
                $table->created_at = db_date($request->created_at).' '.date('H:i:s');
                $table->save();
                $inExpID =  $table->inExpID;


                $cashbook = new CashBook();
                $cashbook->amountOUT = $request->amountOUT;
                $cashbook->transactionType = 'OUT';
                $cashbook->sector = 'Expense';
                $cashbook->refID = $inExpID;
                $cashbook->descriptions =  $request->category;
                $cashbook->branchID = $request->branchID;
                $table->created_at = db_date($request->created_at).' '.date('H:i:s');
                $cashbook->save();

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

            return redirect()->back()->with(config('naz.save'));
        }else{
            return redirect()->back()->with(config('naz.not_happen'));
        }
    }



    public function edit(Request $request){
        DB::beginTransaction();
        try {

            $table = InExp::find($request->id);
            $table->category = $request->category;
            $table->source = $request->source;
            $table->branchID = $request->branchID;
            $table->amountOUT = $request->amountOUT;
            $table->description = $request->description;
            $table->created_at = db_date($request->created_at).' '.date('H:i:s');
            $table->save();

            CashBook::where('sector', 'Expense')->where('transactionType', 'OUT')->where('refID', $request->id)->update([
               'amountOUT' => $request->amountOUT,
               'descriptions' => $request->category,
               'branchID' => $request->branchID,
                'created_at' =>  db_date($request->created_at).' '.date('H:i:s')
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('naz.edit'));
    }

    public function del($id){
        DB::beginTransaction();
        try {

            $table = InExp::find($id);
            $table->delete();

            CashBook::where('sector', 'Expense')->where('transactionType', 'OUT')->where('refID', $id)->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('naz.del'));
    }
}
