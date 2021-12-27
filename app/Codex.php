<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codex extends Model
{
    protected $table = 'codex';
    protected $primaryKey = 'codeID';
    protected $fillable = [
        'name', 'lastKey', 'productCode', 'userID'
    ];
}
