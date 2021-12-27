<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SwapLog extends Model
{
    protected $table = 'swap_log';
    protected $primaryKey = 'swapID';
    protected $fillable = [
        'serialNo', 'seatID_one', 'seatID_two', 'ranterID_one', 'ranterID_two',
        'amount_one', 'amount_two', 'productCode', 'userID',
    ];
}
