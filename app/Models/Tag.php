<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $guarded = [];

    public function portfolio()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_tag');
    }
}
