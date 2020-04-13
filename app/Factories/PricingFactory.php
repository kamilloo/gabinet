<?php
/**
 * Created by PhpStorm.
 * User: kamil
 * Date: 05.08.18
 * Time: 07:12
 */

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Factories\Concerns\PricingConcern;
use App\Factories\Concerns\ServiceConcern;
use App\Http\Requests\Request;
use App\Models\Model;
use App\Models\Pricing;
use App\Models\PricingItem;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class PricingFactory extends AbstractFactory
{
    use PricingConcern;

    /**
     * @var PricingItem[]
     */
    protected $items  = [];

    /**
     * @return Model|Pricing|\Illuminate\Database\Eloquent\Model
     */
    protected function createModel():Model
    {
        return Pricing::newModelInstance();
    }

}
