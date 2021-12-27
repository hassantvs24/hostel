<?php

namespace App\Http\Controllers\Dashboard;

use App\Attemped;
use App\Booking;
use App\Cashbook;
use App\Codex;
use App\Companies;
use App\InExp;
use App\Ranter;
use App\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        //Check Company Info exist
        $company = Companies::first();
        //Check Company Info exist

        $pcode = Codex::first();
        if($pcode != null){
            $enkey = openssl_decrypt(hex2bin($pcode->name),"AES-128-ECB",config('naz.salt_re'));
            $key = ($enkey + config('naz.expire'));
        }else{
            $key = '';
        }

        $currentMonth = date('m');

        $total_ranter = Ranter::orderBy('ranterID')->count();
        $total_booking = Booking::orderBy('bookingID')->count();
        $total_seat = Seat::orderBy('seatID')->count();
        $total_seat_available = Seat::where('status', 'Available')->count();
        $new_ranter = Ranter::whereRaw('MONTH(created_at) = ?',[$currentMonth])->count();
        $new_booking = Booking::whereRaw('MONTH(created_at) = ?',[$currentMonth])->count();

        $month_collection = Cashbook::where('sector', 'Collection')->where('transactionType', 'IN')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->sum('amountIN');
        $month_income = InExp::where('sector', 'Income')->where('trType', 'IN')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->sum('amountIN');
        $month_expance = InExp::where('sector', 'Expense')->where('trType', 'OUT')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->sum('amountOUT');

        $notif_cancel_booking = Booking::where('bookingStatus','Not Sure')->get();

        return view('deshboard.deshboard')->with([
            'key' => $key,
            'company' => $company,
            'total_ranter' => $total_ranter,
            'total_booking' => $total_booking,
            'total_seat' => $total_seat,
            'total_seat_available' => $total_seat_available,
            'new_ranter' => $new_ranter,
            'new_booking' => $new_booking,
            'month_collection' => $month_collection,
            'month_income' => $month_income,
            'month_expance' => $month_expance,
            'notif_cancel_booking' => $notif_cancel_booking
        ]);
    }




    public function codex(Request $request){
        $current = date("Y-m-d");
        $attamp_check = Attemped::count();
        $send_pin = strtolower($request->pin);

        if($attamp_check < config('naz.max_attempted')){

            if (ctype_xdigit($send_pin) && strlen($send_pin) % 2 == 0) {
                $hex_num = hex2bin($send_pin);
                $key = openssl_decrypt($hex_num,"AES-128-ECB",config('naz.salt'));

                if($key){
                    $splite = explode(" - ",$key);
                    if(Auth::user()->productCode == $splite[1]){

                        $timestamp = $splite[0];

                        if(is_timestamp($timestamp)) {

                            $curentlap = strtotime($current);
                            if($timestamp >= $curentlap) {
                                $check = Codex::first();
                                if ($check == null) {
                                    $table = new Codex();
                                    $table->name = bin2hex(openssl_encrypt(($timestamp - config('naz.expire')),"AES-128-ECB",config('naz.salt_re')));
                                    $table->lastKey = $request->pin;
                                    $table->save();

                                    Attemped::where('productCode', Auth::user()->productCode)->delete();
                                    return redirect()->back()->with(config('naz.all_success'));

                                } else {
                                    if ($check->lastKey != $request->pin) {
                                        Codex::where('productCode', Auth::user()->productCode)->update([
                                            'name' => bin2hex(openssl_encrypt(($timestamp - config('naz.expire')),"AES-128-ECB",config('naz.salt_re'))),
                                            'lastKey' => $request->pin
                                        ]);

                                        Attemped::where('productCode', Auth::user()->productCode)->delete();
                                        return redirect()->back()->with(config('naz.all_success'));

                                    } else {

                                        $att = new Attemped();
                                        $att->keys = $request->pin;
                                        $att->save();

                                        return redirect()->back()->with(['message' => 'Invalid Pin. Please Try Again', 'alert-type' => 'error']);//Same Pin Try
                                    }
                                }
                            }else{
                                $att = new Attemped();
                                $att->keys = $request->pin;
                                $att->save();

                                return redirect()->back()->with(['message' => 'Invalid Pin. Please Try Again', 'alert-type' => 'error']);//OLD Time  Validity
                            }

                        }else{
                            $att = new Attemped();
                            $att->keys = $request->pin;
                            $att->save();

                            return redirect()->back()->with(['message' => 'Invalid Pin. Please Try Again', 'alert-type' => 'error']);//Time Format Validity
                        }

                    }else{
                        $att = new Attemped();
                        $att->keys = $request->pin;
                        $att->save();

                        return redirect()->back()->with(['message' => 'Invalid Pin. Please Try Again',  'alert-type' => 'error']);//User check
                    }

                }else{
                    $att = new Attemped();
                    $att->keys = $request->pin;
                    $att->save();

                    return redirect()->back()->with(['message' => 'Invalid Pin. Please Try Again',  'alert-type' => 'error']);//Error Code
                }

            }else{
                $att = new Attemped();
                $att->keys = $request->pin;
                $att->save();

                return redirect()->back()->with(['message' => 'Invalid Pin. Please Try Again',  'alert-type' => 'error']);//Error hexa formate
            }

        }else{
            return view('errors.violance');
        }

    }


}
