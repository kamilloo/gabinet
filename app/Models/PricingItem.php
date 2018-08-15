<?php

namespace App\Models;


class PricingItem extends Model
{
    protected $guarded = [];

    protected $table = 'pricing_items';

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
