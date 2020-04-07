<?php

namespace App\Models;

use App\Contracts\FileModelInterface;

class Service extends FileModel implements FileModelInterface
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
