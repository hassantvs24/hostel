<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'bookingID';
    protected $fillable = [
        'serialNo','ranterID','ranterName','ranterType', 'seatID', 'seatType', 'building', 'floor', 'room',
        'seatNumber', 'admissionFees', 'securityMoney', 'bookingStatus', 'bookingCancelDate',
        'bookingNote', 'branchID', 'branchName', 'productCode', 'userID'
    ];

    public function ranter(){
        return $this->belongsTo('App\Ranter', 'ranterID');
    }

}
