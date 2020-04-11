<?php

namespace App\Http\Requests;

use App\Contracts\PortfolioRequestDataProvider;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;

class PortfolioRequest extends Request implements PortfolioRequestDataProvider
{
    use UploadFileEntryDataTrait;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filepath' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
        ];
    }

    public function tags():array
    {
        return collect(explode(',', $this->tags))->map(function ($tag){
            return mb_strtolower(trim($tag));
        })->all();
    }
}
