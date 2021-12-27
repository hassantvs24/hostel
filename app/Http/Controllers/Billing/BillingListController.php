<?php

namespace App\Http\Controllers\Billing;

use App\Billing;
use App\Booking;
use App\Companies;
use App\Ranter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillingListController extends Controller
{
    public function index(){
        $table = Billing::orderBy('billingID','DESC')->get();
        return view('bill.billing_list')->with(['table' => $table]);
    }

    public function biil_invoice($id){
        $table = Billing::find($id);
       // $ranter = Ranter::find($bill->ranterID);
        $company = Companies::first();

        return view('print.invoice.monthly')->with(['table' => $table, 'company' => $company]);
    }
}
