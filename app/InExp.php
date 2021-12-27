<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InExp extends Model
{
    protected $table = 'in_exp';
    protected $primaryKey = 'inExpID';
    protected $fillable = [
        'serialNo', 'category', 'source', 'amountIN', 'amountOUT', 'description', 'sector', 'trType', 'branchID', 'productCode', 'userID'
    ];

    public function branch(){
        return $this->belongsTo('App\Branch','branchID');
    }
}
