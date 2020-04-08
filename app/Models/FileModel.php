<?php

namespace App\Models;

use App\Contracts\FileModelInterface;

abstract class FileModel extends Model
{
    public function getStoragePath(): string
    {
        return 'services';
    }
}
