<?php


namespace App\Factories\Concerns;


use App\Contracts\EntryDataProvider;
use App\Factories\ServiceBuilder;
use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\Tag;

trait PortfolioConcern
{

    protected function setAttribute(EntryDataProvider $data_provider): void
    {
        $this->tags = collect($data_provider->tags())->map(function($raw){
            return Tag::firstOrCreate([
                'name' => $raw
            ]);
        });
    }

    public function save(): bool
    {

        $saved = parent::save();
        $this->instance->tags()->sync($this->tags->pluck('id'));
        return $saved;
    }
}
