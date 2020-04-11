<?php

namespace App\Contracts;

interface PortfolioUpdateDataProvider extends EntryDataProvider
{
    public function tags(): array ;
    public function position(): int ;
}
