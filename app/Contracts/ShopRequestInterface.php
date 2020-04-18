<?php

namespace App\Contracts;

interface ShopRequestInterface
{
    public function getUrl(): ?string;
    public function getStatus(): string;
}
