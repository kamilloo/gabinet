<?php

namespace App\Contracts;

interface PricingItemRequestDataProvider
{
    public function getTitle(): string;
    public function getDescription(): ?string;
    public function getPrice(): ?float ;
    public function getLink(): ?string ;
}
