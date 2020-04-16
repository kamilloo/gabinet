<?php

namespace App\Contracts;

interface PricingItemRequestDataProvider
{
    public function getTitle(): string;
    public function getDescription(): ?string;
    public function getPrice(): ?string ;
    public function getLink(): ?string ;
}
