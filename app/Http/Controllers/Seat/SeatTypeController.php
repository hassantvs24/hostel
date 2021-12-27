<?php

namespace App\Http\Controllers\Seat;

use App\SeatType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SeatTypeController extends Controller
{
    public function index(){
        $table = SeatType::orderBy('created_at', 'DESC')->get();
        return view('seat.seat_type')->with(['table' => $table]);
    }


    public function save(Request $request){
        $colour = $request->bg.', '.$request->tx;

        $maxValue = SeatType::max('serialNo');
        $table = new SeatType();
        $table->serialNo = ($maxValue + 1);
        $table->name = $request->name;
        $table->colour = $colour;
        $table->amount = $request->amount;
        $table->save();

        return redirect()->back()->with(config('naz.save'));
    }


    public function edit(Request $request){
        $colour = $request->bg.', '.$request->tx;

        $table = SeatType::find($request->id);
        $table->name = $request->name;
        $table->colour = $colour;
        $table->amount = $request->amount;
        $table->save();

        return redirect()->back()->with(config('naz.edit'));
    }


    public function del($id){
        $table = SeatType::find($id);
        if($table->productCode == Auth::user()->productCode) {
            $table->delete();

            return redirect()->back()->with(config('naz.del'));

        }else{
            return view('errors.404');
        }
    }

}
