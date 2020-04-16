<?php
declare(strict_types=1);

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;
use App\Factories\Concerns\PortfolioConcern;
use App\Factories\Concerns\ServiceConcern;
use App\Http\Requests\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Model;
use App\Models\Portfolio;
use App\Models\Pricing;
use App\Models\PricingItem;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class PortfolioFactory extends AbstractFactory
{
    use PortfolioConcern;
    /**
     * @return Model|Service|\Illuminate\Database\Eloquent\Model
     */
    protected function createModel():Model
    {
        return Portfolio::newModelInstance();
    }
}
