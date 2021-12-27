<?php
/**
 * Created by PhpStorm.
 * User: Nazmul
 * Date: 9/19/2018
 * Time: 12:11 PM
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UserScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('productCode', Auth::user()->productCode);
    }

}