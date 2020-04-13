<?php

namespace App\Contracts;

interface PricingRequestDataProvider extends EntryDataProvider
{
    public function getName(): string;
    public function getPriceSince(): float ;
    /**
     * @return PricingItemRequestDataProvider[]
     */
    public function items(): array;
}
