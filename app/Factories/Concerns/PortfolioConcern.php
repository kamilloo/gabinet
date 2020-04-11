<?php


namespace App\Factories\Concerns;


use App\Contracts\EntryDataProvider;
use App\Factories\ServiceBuilder;
use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\Tag;

trait PortfolioConcern
{

    protected function addRelations(EntryDataProvider $data_provider): void
    {
        $tags = collect($data_provider->tags())->map(function($raw){
            return Tag::firstOrCreate([
                'name' => $raw
            ]);
        });
        $this->instance->tags()->attach($tags->pluck('id'));
    }
}
