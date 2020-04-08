<?php
/**
 * Created by PhpStorm.
 * User: kamil
 * Date: 05.08.18
 * Time: 07:12
 */

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Http\Requests\Request;
use App\Models\Model;
use App\Models\Pricing;
use App\Models\PricingItem;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class PricingFactory extends AbstractFactory
{
    /**
     * @var Pricing
     */
    protected $pricing;
    /**
     * @var PricingItem
     */
    protected $pricing_item;

    protected $items = [];

    public function __construct(Connection $db, Log $logger, FilesystemManager $storage, Pricing $pricing, PricingItem $pricing_item)
    {
        parent::__construct($db, $logger, $storage);
        $this->pricing = $pricing;
        $this->pricing_item = $pricing_item;
    }

    protected function createModel():Model
    {
        return $this->pricing->newInstance();
    }
    protected function setAttribute(EntryDataProvider $data_provider):void
    {
        $this->instance->fill([
            'name' => $data_provider->name,
            'price_since' => $data_provider->price_since,
        ]);
        collect($data_provider->items)->each(function($item){
           $price = $this->pricing_item->newInstance([
               'title' => array_get($item, 'title'),
               'description' => array_get($item, 'description'),
               'price' => array_get($item, 'price'),
               'link' => array_get($item, 'link'),
           ]);
           $this->items[] = $price;
        });
    }

    public function save()
    {
        parent::save();
        collect($this->items)->each(function($item){
            $item->pricing()->associate($this->instance);
            $item->save();
        });
    }

}
