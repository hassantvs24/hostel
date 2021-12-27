<?php

namespace App\Http\Controllers\Seat;

use App\Branch;
use App\Seat;
use App\SeatType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SeatController extends Controller
{
    public function index(){
        $table = Branch::orderBy('created_at', 'DESC')->get();
        $seatType = SeatType::orderBy('created_at', 'DESC')->get();

        return view('seat.seats')->with(['table' => $table, 'seatType' => $seatType]);
    }

    public function save(Request $request){
        $maxValue = Seat::max('serialNo');
        $table = new Seat();
        $table->serialNo = ($maxValue + 1);
        $table->branchName = $request->branchName;
        $table->seatTypeID = $request->seatTypeID;
        $table->seatType = $request->seatType;
        $table->building = $request->building;
        $table->floor = 0;//$request->floor;
        $table->room = $request->room;//Seat Number
        $table->amount = $request->amount;
        $table->colour = $request->colour;
        $table->branchID = $request->branchID;
        $table->description = $request->description;
        $table->seatNumber = $request->building.$request->room;
        $table->save();

        return redirect()->back()->with(config('naz.save'));
    }


    public function edit(Request $request){
        $table = Seat::find($request->id);

        $maxValue = $table->serialNo;

        $ranterID = ($table->ranterID == '' ? '':'#'.$table->ranterID);

        $table->branchName = $request->branchName;
        $table->seatTypeID = $request->seatTypeID;
        $table->seatType = $request->seatType;
        $table->building = $request->building;
        //$table->floor = $request->floor;
        $table->room = $request->room;//Seat Number
        $table->amount = $request->amount;
        $table->colour = $request->colour;
        $table->branchID = $request->branchID;
        $table->description = $request->description;
        $table->seatNumber = $request->building.$request->room.$ranterID;
        $table->save();

        return redirect()->back()->with(config('naz.edit'));
    }


    public function del($id){
        $table = Seat::find($id);
        if($table->productCode == Auth::user()->productCode) {
            $table->delete();

            return redirect()->back()->with(config('naz.del'));

        }else{
            return view('errors.404');
        }
    }

    public function disabled($id){
        $table = Seat::find($id);
        if($table->productCode == Auth::user()->productCode) {

            if($table->status == 'Disabled'){
                $table->status = 'Available';
            }else{
                $table->status = 'Disabled';
            }

            $table->save();

            return redirect()->back()->with(config('naz.edit'));

        }else{
            return view('errors.404');
        }
    }

}
