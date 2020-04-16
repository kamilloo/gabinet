<?php

namespace App\Http\Requests;

use App\Contracts\PricingItemRequestDataProvider;
use App\Contracts\PricingRequestDataProvider;
use App\Http\Requests\Concerns\NameEntryDataTrait;
use App\Http\Requests\Concerns\TitleAndDescriptionDataTrait;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use PhpParser\Builder\Class_;

class PricingRequest extends Request implements PricingRequestDataProvider
{
    use UploadFileEntryDataTrait, NameEntryDataTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'price_since' => ['required', 'numeric'],
            'filepath' => ['nullable', 'url'],
            'items' => ['nullable', 'array'],
            'items.*.title' => ['required', 'string', 'min:1'],
            'items.*.description' => ['nullable', 'string', 'min:1'],
            'items.*.price' => ['nullable', 'string', 'min:1'],
            'items.*.link' => ['nullable','url',],
        ];
    }

    public function getPriceSince(): float
    {
        return $this->input('price_since');
    }

    /**
     * @inheritDoc
     */
    public function items(): array
    {
        return Collection::make($this->input('items'))->map(function (array $item){
            return $this->toPricingItemEntryData($item);
        })->all();
    }

    private function toPricingItemEntryData(array $item)
    {
        return new class($item) implements PricingItemRequestDataProvider{

            /**
             * @var array
             */
            protected $item;

            public function __construct(array $item)
            {
                $this->item = $item;
            }

            public function getTitle(): string
            {
                return Arr::get($this->item, 'title');
            }

            public function getDescription(): ?string
            {
                return Arr::get($this->item, 'description');
            }

            public function getPrice(): ?string
            {
                return Arr::get($this->item, 'price');
            }

            public function getLink(): ?string
            {
                return Arr::get($this->item, 'link');
            }
        };
    }
}
