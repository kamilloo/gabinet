<?php

namespace App\Http\Requests;

class PricingRequest extends Request
{
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
            'items' => ['required', 'array'],
            'items.*.title' => ['required', 'string', 'min:1'],
            'items.*.description' => ['nullable', 'string', 'min:1'],
            'items.*.price' => ['nullable', 'numeric', 'string', 'min:1'],
            'items.*.link' => ['nullable','url',],
        ];
    }
}
