<?php

namespace App\Models;

use App\Contracts\FileModelInterface;

class Pricing extends FileModel implements FileModelInterface
{
    protected $guarded = [];

    protected $table = 'pricing';

    public function getStoragePath(): string
    {
        return 'pricing';
    }

    public function items()
    {
        return $this->hasMany(PricingItem::class);
    }
}
