<?php

namespace App\Models;

use App\Contracts\FileModelInterface;
use App\Models\Category;

class Portfolio extends FileModel implements FileModelInterface
{
    protected $guarded = [];

    public function Categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getStoragePath(): string
    {
        return 'portfolio/';
    }
}
