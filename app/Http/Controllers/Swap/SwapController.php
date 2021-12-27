<?php

namespace App\Http\Controllers\Swap;

use App\Branch;
use App\Seat;
use App\SeatType;
use App\SwapLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SwapController extends Controller
{
    public function index(){
        $table = Branch::orderBy('created_at', 'DESC')->get();
        $seatType = SeatType::orderBy('created_at', 'DESC')->get();

        return view('swap.regular')->with(['table' => $table, 'seatType' => $seatType]);
    }

    public function swap(Request $request){
        DB::beginTransaction();
        try {

       // dd($request->all());
            $init = Seat::find($request->seatID_two);
            $init->ranterID = null;
            $init->save();

            //Seat 1
            $seat1 = Seat::find($request->seatID_one);
            $seatNumber1 = explode("#",$seat1->seatNumber);

            if($request->ranterID_two == ''){
                $seat1->seatNumber = $seatNumber1[0];
                $seat1->ranterID = null;
                $seat1->status = 'Available';
            }else{
                $seat1->seatNumber = $seatNumber1[0].'#'.$request->ranterID_two;
                $seat1->ranterID = $request->ranterID_two;
            }
            $seat1->save();
            //Seat 1

            //Seat 2
            $seat2 = Seat::find($request->seatID_two);


            if($request->ranterID_two == ''){
                $seatNumber2 = $seat2->seatNumber.'#'.$request->ranterID_one;
                $seat2->seatNumber = $seatNumber2;
                $seat2->ranterID = $request->ranterID_one;
                $seat2->status = 'Booked';
            }else{
                $seatNumber2 = explode("-",$seat2->seatNumber);
                $seat2->seatNumber = $seatNumber2[0].'#'.$request->ranterID_one;
                $seat2->ranterID = $request->ranterID_one;
            }
            $seat2->save();
            //Seat 2

            $maxSwap_log = SwapLog::max('serialNo');
            $swap_log = new SwapLog();
            $swap_log->serialNo = $maxSwap_log +1;
            $swap_log->seatID_one = $request->seatID_one;
            $swap_log->seatID_two = $request->seatID_two;
            $swap_log->ranterID_one = $request->ranterID_one;
            $swap_log->ranterID_two = $request->ranterID_two;
            $swap_log->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('naz.save'));
    }
}
