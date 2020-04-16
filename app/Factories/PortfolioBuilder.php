<?php

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Factories\Concerns\PortfolioConcern;
use App\Factories\Concerns\ServiceConcern;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Http\Requests\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Model;
use App\Models\Pricing;
use App\Models\PricingItem;
use App\Models\Service;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class PortfolioBuilder extends AbstractBuilder
{
    use PortfolioConcern;
}
