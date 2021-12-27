<?php

namespace App\Http\Controllers\Booking;

use App\Branch;
use App\Seat;
use App\SeatType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeatController extends Controller
{
    public function index(){

        $table = Seat::orderBy('created_at', 'DESC')->get();
        return view('booking.seats')->with(['table' => $table]);
    }
}
