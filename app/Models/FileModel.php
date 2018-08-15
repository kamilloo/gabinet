<?php

namespace App\Models;

use App\Contracts\FileModelInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class FileModel extends Eloquent implements FileModelInterface
{
    //
}
