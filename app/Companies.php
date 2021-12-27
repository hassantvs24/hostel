<?php

namespace App;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'companyID';
    protected $fillable = [
        'name','address','city','state','post','currency','dateFormat','owner','phone','fax','mobile','website','email','companyType', 'logo', 'productCode', 'userID'
    ];

}
