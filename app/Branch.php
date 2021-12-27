<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $primaryKey = 'branchID';
    protected $fillable = [
        'serialNo', 'name', 'productCode', 'userID'
    ];


    public function seat(){

        return $this->hasMany('App\Seat', 'branchID');

    }

}
