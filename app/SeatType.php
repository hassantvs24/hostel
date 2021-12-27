<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatType extends Model
{
    protected $table = 'seat_type';
    protected $primaryKey = 'seatTypeID';
    protected $fillable = [
        'serialNo', 'name', 'colour', 'amount', 'productCode', 'userID'
    ];

    public function getColourAttribute($value)
    {
        $color = explode(", ", $value);
        return $color;
    }
}
