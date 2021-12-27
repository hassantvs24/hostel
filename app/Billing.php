<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table = 'billing';
    protected $primaryKey = 'billingID';
    protected $fillable = [
        'serialNo', 'billNameID', 'billName', 'ranterID', 'ranterName', 'ranterType', 'seatID', 'seatType', 'building',
        'floor', 'room', 'seatNumber', 'amount', 'preDue', 'discount', 'adCharge', 'branchID', 'productCode', 'userID'
    ];

    public function ranter(){
        return $this->belongsTo('App\Ranter', 'ranterID');
    }

    public function bill_name(){
        return $this->belongsTo('App\BillName', 'billNameID');
    }

    public function branch(){
        return $this->belongsTo('App\Branch', 'branchID');
    }
}
