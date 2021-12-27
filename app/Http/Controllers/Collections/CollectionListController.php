<?php

namespace App\Http\Controllers\Collections;

use App\Billing;
use App\Cashbook;
use App\Ranter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CollectionListController extends Controller
{
    public function index(){

        $table = Ranter::orderBy('created_at','DESC')->get();
        return view('collections.collection')->with(['table' => $table]);
    }

    public function bill_collection(Request $request){
        if ($request->amount > 0){
            //Finding Branch
            $ranter = Ranter::find($request->ranterID);
            $seat = $ranter->seat($request->ranterID);
            //Finding Branch
            
            $cashbook = new CashBook();
            $cashbook->amountIN = $request->amount;
            $cashbook->transactionType = 'IN';
            $cashbook->sector = 'Collection';
            $cashbook->refID = $request->ranterID;
            $cashbook->remark = $request->remark;
            $cashbook->accounts = $request->accounts;
            $cashbook->descriptions =  config('naz.collect');
            $cashbook->branchID = $seat->branchID;
            $cashbook->created_at = db_date($request->created_at).' '.date('H:i:s');
            $cashbook->save();

            //SMS
            $contact = "88".$ranter->contact;
            $id = $ranter->seat($request->ranterID)->seatNumber;
            $sms = urlencode("Dear ".$ranter->name." ID ".$id." Your Payment of tk. ".$request->amount." is received. Thank you, City Hostel.");

            file_get_contents('http://api.infobip.com/api/v3/sendsms/plain?user=city_hostel&password=OgaCbpsE&sender=8804445657426&SMSText='.$sms.'&GSM='.$contact.'&type=longSMS');
            //SMS


            return redirect()->back()->with(config('naz.save'));
        }else{
            return redirect()->back()->with(config('naz.not_happen'));
        }
    }
}
