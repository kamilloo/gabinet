<?php


namespace App\Http\Requests\Concerns;


use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\ServiceRequest;

/**
 * Trait TagsEntryDataTrait
 *
 * @property-read string $tags
 */
trait TagsEntryDataTrait
{

    public function tags(): array
    {
        return collect(explode(',', $this->tags))->map(function ($tag) {
            return mb_strtolower(trim($tag));
        })->all();
    }
}
