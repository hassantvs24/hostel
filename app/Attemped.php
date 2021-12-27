<?php

namespace App;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;

class Attemped extends Model
{
    protected $table = 'attemped_log';
    protected $primaryKey = 'logID';
    protected $fillable = [
        'keys', 'productCode', 'userID'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserScope);
    }
}
