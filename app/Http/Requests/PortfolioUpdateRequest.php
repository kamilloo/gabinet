<?php

namespace App\Http\Requests;

use App\Contracts\PortfolioRequestDataProvider;
use App\Contracts\PortfolioUpdateDataProvider;
use App\Http\Requests\Concerns\TagsEntryDataTrait;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;

class PortfolioUpdateRequest extends Request implements PortfolioUpdateDataProvider
{
    use TagsEntryDataTrait;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position' => ['required', 'integer'],
            'tags' => ['nullable', 'string'],
        ];
    }

    public function position(): int
    {
        return $this->input('position');
    }

    public function getFilePath(): string
    {
        return '';
    }
}
