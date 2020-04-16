<?php


namespace App\Factories\Concerns;


use App\Contracts\EntryDataProvider;
use App\Factories\ServiceBuilder;
use App\Http\Requests\ServiceRequest;

trait ServiceConcern
{

    /**
     * @param EntryDataProvider|ServiceRequest $data_provider
     */
    protected function setAttribute(EntryDataProvider $data_provider):void
    {
        $this->instance->fill([
            'title' => $data_provider->getTitle(),
            'description' => $data_provider->getDescription(),
            'category_id' => $data_provider->getCategoryId()
        ]);
    }
}
