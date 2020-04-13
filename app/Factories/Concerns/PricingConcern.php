<?php


namespace App\Factories\Concerns;


use App\Contracts\EntryDataProvider;
use App\Contracts\PricingItemRequestDataProvider;
use App\Factories\AbstractFactory;
use App\Factories\PricingFactory;
use App\Factories\ServiceBuilder;
use App\Http\Requests\PricingRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\PricingItem;

trait PricingConcern
{
    public function save(): bool
    {
        $saved = parent::save();
        $this->instance->items()->delete();
        collect($this->items)->each(function (PricingItem $item) {
            $item->pricing()->associate($this->instance);
            $item->save();
        });

        return $saved;
    }

    /**
     * @param EntryDataProvider|PricingRequest $data_provider
     */
    protected function setAttribute(EntryDataProvider $data_provider):void
    {
        $this->instance->fill([
            'name' => $data_provider->getName(),
            'price_since' => $data_provider->getPriceSince(),
        ]);

        collect($data_provider->items())->each(function(PricingItemRequestDataProvider $item){
            $price = PricingItem::newModelInstance([
                'title' => $item->getTitle(),
                'description' => $item->getDescription(),
                'price' => $item->getPrice(),
                'link' => $item->getLink(),
            ]);
            $this->items[] = $price;
        });
    }

    protected function addRelations(EntryDataProvider $data_provider): void
    {
        // TODO: Implement addRelations() method.
    }
}
