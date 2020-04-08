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
        return 'portfolio';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'portfolio_tag');
    }

    public function tagsToString()
    {
        return implode(' ',$this->tags->pluck('name')->all());
    }
}
