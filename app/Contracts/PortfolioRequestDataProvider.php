<?php

namespace App\Contracts;

interface PortfolioRequestDataProvider extends EntryDataProvider
{
    public function tags(): array ;
}
