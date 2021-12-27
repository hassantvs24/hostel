<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seat';
    protected $primaryKey = 'seatID';
    protected $fillable = [
        'serialNo', 'building', 'floor', 'room', 'seatNumber', 'branchID', 'seatTypeID', 'seatType', 'branchName',
        'colour', 'amount', 'description', 'ranterID', 'status', 'productCode', 'userID'
    ];

    public function getColourAttribute($value)
    {
        $color = explode(", ", $value);
        return $color;
    }

    public function check($seatID, $billNameID){
        $table = Billing::where('seatID',$seatID)->where('billNameID',$billNameID)->first();
        if ($table == null){
            return null;
        }else{
            return $table;
        }
    }

    public function ranter(){
        return $this->belongsTo('App\Ranter','ranterID');
    }
    public function branch(){
        return $this->belongsTo('App\Branch','branchID');
    }

}
