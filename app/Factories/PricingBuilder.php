<?php
/**
 * Created by PhpStorm.
 * User: kamil
 * Date: 05.08.18
 * Time: 07:12
 */

namespace App\Factories;

use App\Http\Requests\Request;
use App\Models\Model;
use App\Models\Pricing;
use App\Models\PricingItem;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class PricingBuilder extends AbstractBuilder
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

    protected function setAttribute(Request $request)
    {
        $this->instance->fill([
            'name' => $request->name,
            'price_since' => $request->price_since,
        ]);
        collect($request->items)->each(function($item){
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
        $this->instance->items()->delete();
        collect($this->items)->each(function($item){
            $item->pricing()->associate($this->instance);
            $item->save();
        });
    }

}