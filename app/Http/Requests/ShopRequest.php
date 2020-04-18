<?php

namespace App\Http\Requests;


use App\Contracts\CategoryRequestInterface;
use App\Contracts\ShopRequestInterface;

class ShopRequest extends Request implements ShopRequestInterface
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => ['nullable', 'url'],
            'status' => ['required', 'boolean']
        ];
    }

    public function getUrl(): ?string
    {
        return $this->input('url');
    }

    public function getStatus(): string
    {
        return $this->input('status');
    }
}
