<?php

namespace App\Models;

use App\Category;

class Portfolio extends Model
{
    protected $guarded = [];

    public function Categories()
    {
        return $this->hasMany(Category::class);
    }
}
