<?php

namespace App\Models;

use App\Contracts\FileModelInterface;
use Illuminate\Database\Eloquent\Model;

class Certificate extends FileModel implements FileModelInterface
{
    protected $guarded = [];

    public function getStoragePath(): string
    {
        return 'certificates/';
    }
}
