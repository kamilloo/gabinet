<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{

    /**
     * @return \Closure
     */
    public static function orderByPosition(): \Closure
    {
        return function ($query) {
            $query->orderBy('position');
        };
    }
}
