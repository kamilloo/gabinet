<?php

namespace App\Models;

use App\Contracts\FileModelInterface;
use Illuminate\Database\Eloquent\Model;

class Service extends FileModel implements FileModelInterface
{
    protected $guarded = [];

    public function getStoragePath(): string
    {
        return 'services/';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
