<?php

namespace App\Http\Requests;

use App\Contracts\PricingItemRequestDataProvider;
use App\Contracts\PricingRequestDataProvider;
use App\Http\Requests\Concerns\NameEntryDataTrait;
use App\Http\Requests\Concerns\TitleAndDescriptionDataTrait;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;

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
            'items' => ['required', 'array'],
            'items.*.title' => ['required', 'string', 'min:1'],
            'items.*.description' => ['nullable', 'string', 'min:1'],
            'items.*.price' => ['nullable', 'numeric', 'string', 'min:1'],
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
        return [];
    }
}
