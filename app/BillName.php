<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillName extends Model
{
    protected $table = 'billing_name';
    protected $primaryKey = 'billNameID';
    protected $fillable = [
        'name', 'last_pay', 'branchID', 'productCode', 'userID'
    ];
    public function branch(){

        return $this->belongsTo('App\Branch', 'branchID');

    }
    public function billing()
    {
        return $this->hasMany('App\Billing', 'billNameID');
    }
}
