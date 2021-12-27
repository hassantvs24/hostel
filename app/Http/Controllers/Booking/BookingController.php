<?php

namespace App\Http\Controllers\Booking;

use App\Booking;
use App\Branch;
use App\Cashbook;
use App\Companies;
use App\Ranter;
use App\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(){

        $table = Branch::orderBy('created_at', 'DESC')->get();

        $ranterIDs = Booking::select('ranterID')->where('ranterID', '<>', null)->get();
        $ranter = Ranter::whereNotIn('ranterID', $ranterIDs)->where('status', 'Active')->orderBy('ranterID', 'DESC')->get();

        return view('booking.booking')->with(['table' => $table, 'ranter' => $ranter]);

    }

    public function booking(Request $request){

        DB::beginTransaction();
        try {

            $seatNumber = $request->seatNumber.'#'.$request->ranterID;
            $maxValue = Booking::max('serialNo');
            //Booking Table
            $table = new Booking();
            $table->serialNo = ($maxValue + 1);
            $table->ranterID = $request->ranterID;
            $table->ranterName = $request->ranterName;
            $table->ranterType = $request->ranterType;
            $table->seatID = $request->seatID;
            $table->seatType = $request->seatType;
            $table->building = $request->building;
            $table->floor = $request->floor;
            $table->room = $request->room;//Seat Number
            $table->seatNumber = $seatNumber;
            $table->admissionFees = $request->admissionFees;
            $table->securityMoney = $request->securityMoney;
            $table->bookingStatus = 'Not Sure';
            $table->bookingCancelDate = db_date($request->bookingCancelDate);
            $table->bookingNote = $request->bookingNote;
            $table->branchID = $request->branchID;
            $table->branchName = $request->branchName;
            $table->created_at = db_date($request->created_at).' '.date('H:i:s');
            $table->save();
            $bookingID = $table->bookingID;
            //Booking Table


            //Seat Table
            $seat = Seat::find($request->seatID);
            $seat->seatNumber = $seatNumber;
            $seat->ranterID = $request->ranterID;
            $seat->status = 'Booked';
            $seat->save();
            //Seat Table


            if ($request->securityMoney > 0) {
                $cashbook = new CashBook();
                $cashbook->amountIN = $request->securityMoney;
                $cashbook->transactionType = 'IN';
                $cashbook->sector = 'Security';
                $cashbook->refID = $bookingID;
                $cashbook->descriptions = config('naz.security');
                $cashbook->branchID = Auth::user()->branchID;
                $cashbook->created_at = db_date($request->created_at) . ' ' . date('H:i:s');
                $cashbook->save();
            }

            if ($request->admissionFees > 0) {
                $cashbook = new CashBook();
                $cashbook->amountIN = $request->admissionFees;
                $cashbook->transactionType = 'IN';
                $cashbook->sector = 'Admission';
                $cashbook->refID = $bookingID;
                $cashbook->descriptions = config('naz.admission');
                $cashbook->branchID = Auth::user()->branchID;
                $cashbook->created_at = db_date($request->created_at) . ' ' . date('H:i:s');
                $cashbook->save();
            }


            $ranter = Ranter::find($request->ranterID);

            //SMS
            $contact = "88".$ranter->contact;
            $sms = urlencode("Welcome to City Hostel, Dear ".$ranter->name." Your ID ".$seatNumber.", Room No- ".$request->room.", and Seat No- ".$request->seatNumber.". Your Admission successfully Thank you for choosing City hostel services.");

            file_get_contents('http://api.infobip.com/api/v3/sendsms/plain?user=city_hostel&password=OgaCbpsE&sender=8804445657426&SMSText='.$sms.'&GSM='.$contact.'&type=longSMS');
            //SMS


            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->to('booked/receipt/'.$bookingID);
    }

    public function edit_booking(Request $request){
        DB::beginTransaction();
        try {

            //Booking Table
            $table = Booking::find($request->id);
            $table->bookingCancelDate = db_date($request->bookingCancelDate);
            $table->bookingNote = $request->bookingNote;
            $table->admissionFees = $request->admissionFees;
            $table->securityMoney = $request->securityMoney;
            $table->bookingStatus = $request->bookingStatus;
            $table->created_at = db_date($request->created_at).' '.date('H:i:s');
            $table->save();
            //Booking Table

            CashBook::where('sector', 'Security')->where('refID', $request->id)->where('transactionType', 'IN')
                ->update([
                    'amountIN' => $request->securityMoney,
                    'created_at' => db_date($request->created_at).' '.date('H:i:s')
                ]);

            CashBook::where('sector', 'Admission')->where('refID', $request->id)->where('transactionType', 'IN')
                ->update([
                    'amountIN' => $request->admissionFees,
                    'created_at' => db_date($request->created_at).' '.date('H:i:s')
                ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->to('booked/receipt/'.$request->id);
    }

    //booked list
    public function booked(){
        $table = Booking::orderBy('bookingID','DESC')->get();
        return view('booking.booked')->with(['table' => $table]);
    }

    public function money_receipt($id){
        $table = Booking::find($id);
        $company = Companies::first();

        return view('print.invoice.booking')->with(['table' => $table, 'company' => $company]);
    }

    // cancel booking
    public function cancel_booking($id, $ranters){
      //  dd([$id, $ranterID]);

        DB::beginTransaction();
        try {

            //Booking Table del
                $table = Booking::find($id);
                $ranterID = $ranters;
                $seatNumber2 = $table->seatNumber;
                $room = $table->room;
                $seatID = $table->seatID;
                
               // dd([$ranterID, $seatID]);

                $table->delete();
            //Booking Table del


            //Seat Table update
            $seat = Seat::find($seatID);
            $current_renter = $seat->ranterID;

            if($current_renter == $ranterID){
                $seatNumber = explode("#",$seat->seatNumber);
                $seat->seatNumber = $seatNumber[0];
                $seat->ranterID = null;
                $seat->status = 'Available';
                $seat->save();
            }

            //Seat Table update
            

            $ranter = Ranter::find($ranterID);
            if($ranter){
            $ranter->status = 'Inactive';
            $ranter->save();
            

            //SMS
            $contact = "88".$ranter->contact;
            $sms = urlencode("Dear ".$ranter->name." Your ID ".$seatNumber2.", Room No- ".$room.", Seat No- ".$seatNumber[0].". Your City hostel Seat Admission Cancel.");

            file_get_contents('http://api.infobip.com/api/v3/sendsms/plain?user=city_hostel&password=OgaCbpsE&sender=8804445657426&SMSText='.$sms.'&GSM='.$contact.'&type=longSMS');
            //SMS

            }
            
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->back()->with(config('naz.del'));
    }


    public function sure_book($id){
        $table = Booking::find($id);
        $table->bookingStatus = 'Sure';
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }


}
