<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashbook extends Model
{
    protected $table = 'cashbook';
    protected $primaryKey = 'cashbookID';
    protected $fillable = [
        'serialNo', 'amountIN', 'amountOUT', 'transactionType', 'descriptions',
        'sector', 'refID', 'remark', 'accounts', 'branchID', 'productCode', 'userID'
    ];

    public function ranter($ranterID){
      $table = Ranter::find($ranterID);
      return $table;
    }

    public function branch(){
        return $this->belongsTo('App\Branch', 'branchID');
    }

}
