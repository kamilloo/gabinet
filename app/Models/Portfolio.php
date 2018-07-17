<?php

namespace App\Models;

use App\Models\Category;

class Portfolio extends Model
{
    protected $guarded = [];

    public function Categories()
    {
        return $this->hasMany(Category::class);
    }
}
