<?php

namespace App\Http\Controllers\Billing;

use App\Billing;
use App\BillName;
use App\Branch;
use App\Cashbook;
use App\Ranter;
use App\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewBillingController extends Controller
{
    public function index(){
        $table = BillName::orderBy('billNameID','DESC')->get();
        $branch = Branch::orderBy('name','ASC')->get();
        return view('bill.bill_name')->with(['table'=>$table,'branch'=>$branch]);
    }

    // bill name generate

    public function save(Request $request){
        $table = new BillName();
        $table->name = $request->name;
        $table->created_at = db_date($request->created_at).' '.date('H:i:s');
        $table->last_pay = db_date($request->last_pay);
        $table->save();

        return redirect()->back()->with(config('naz.save'));
    }

    // edit bill name

    public function edit(Request $request){
        $table = BillName::find($request->id);
        $table->created_at = db_date($request->created_at).' '.date('H:i:s');
        $table->last_pay = db_date($request->last_pay);
        $table->save();

        return redirect()->back()->with(config('naz.edit'));
    }

    // del bill name

    public function del($id){
        $table = BillName::find($id);
        if($table->productCode == Auth::user()->productCode) {
            DB::beginTransaction();
            try {


                $billing = Billing::select('billingID')->where('billNameID', $id)->get();

                foreach ($billing as $row){
                    CashBook::where('sector', 'Billing')->where('refID', $row->billingID)->where('transactionType', 'OUT')->delete();
                }

                $table->delete();

                Billing::where('billNameID', $id)->delete();


                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }
            return redirect()->back()->with(config('naz.del'));
        }else{
            return view('errors.404');
        }
    }

    // single billing
    public function bill_list($id){
        $table = BillName::find($id);
        $seat = Seat::orderBy('seatID','DESC')->where('status','Booked')->get();
        return view('bill.single_bill')->with(['table' => $table,'seat' => $seat]);
    }


    //bill generate
    public function bill_generate(Request $request){

        if (isset($request->seatID)) {

            $amount = $request->bill;
            $adCharge = $request->adCharge;
            $discount = $request->discount;

            DB::beginTransaction();
            try {

                foreach ($request->seatID as $id) {

                    $seat = Seat::find($id);
                    $ranter = Ranter::find($seat->ranterID);

                    $maxvalue = Billing::max('serialNo');
                    $table = new Billing();
                    $table->serialNo = ($maxvalue + 1);
                    $table->billNameID = $request->billNameID;
                    $table->billName = $request->billName;
                    $table->ranterID = $seat->ranterID;
                    $table->ranterName = $ranter->name;
                    $table->ranterType = $ranter->ranterType;
                    $table->branchID = $seat->branchID;
                    $table->seatID = $seat->seatID;
                    $table->seatType = $seat->seatType;
                    $table->building = $seat->building;
                    $table->floor = $seat->floor;
                    $table->room = $seat->room;
                    $table->seatNumber = $seat->seatNumber;
                    $table->amount = $amount[$id];
                    $table->adCharge = $adCharge[$id];
                    $table->discount = $discount[$id];
                    $table->save();
                    $billingID = $table->billingID;
                    $totalAmount = $amount[$id] + $adCharge[$id] - $discount[$id];

                    if ($totalAmount > 0){
                        $cashbook = new CashBook();
                        $cashbook->amountOUT = $totalAmount;
                        $cashbook->transactionType = 'OUT';
                        $cashbook->sector = 'Billing';
                        $cashbook->refID = $billingID;
                        $cashbook->descriptions =  config('naz.bill_gen');
                        $cashbook->branchID = $seat->branchID;
                        $cashbook->save();
                    }
                }

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

            return redirect()->back()->with(config('naz.bill_generate'));

        }else{
            return redirect()->back()->with(config('naz.not_happen'));
        }

    }

    public function bill_del($id){
        $table = Billing::find($id);
        if($table->productCode == Auth::user()->productCode) {
            DB::beginTransaction();
            try {
                $table->delete();

                CashBook::where('sector', 'Billing')->where('refID', $id)->where('transactionType', 'OUT')->delete();

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

            return redirect()->back()->with(config('naz.del'));
        }else{
            return view('errors.404');
        }
    }

    public function bill_edit(Request $request){
        $table = Billing::find($request->id);
        if($table->productCode == Auth::user()->productCode) {
            DB::beginTransaction();
            try {

                $table->discount = $request->discount;
                $table->adCharge = $request->adCharge;
                $table->amount = $request->amount;
                $table->save();
                $totalAmount = $request->amount + $request->adCharge - $request->discount;

                CashBook::where('sector', 'Billing')->where('refID', $request->id)->where('transactionType', 'OUT')
                    ->update([
                        'amountOUT' => $totalAmount
                    ]);

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

            return redirect()->back()->with(config('naz.edit'));
        }else{
            return view('errors.404');
        }

    }

    public function bill_slip($id){
        $table = BillName::find($id);
        $billing =Billing::where('billNameID', $id)->get();
        return view('print.bill.bill_slip')->with(['table' => $table,'billing'=>$billing]);
    }
}
