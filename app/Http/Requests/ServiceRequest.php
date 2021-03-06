<?php

namespace App\Http\Requests;


use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;
use App\Http\Requests\Concerns\TitleAndDescriptionDataTrait;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;
use Illuminate\Validation\Rule;

class ServiceRequest extends Request implements ServiceRequestDataProvider
{
    use UploadFileEntryDataTrait, TitleAndDescriptionDataTrait;
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'filepath' => ['nullable', 'url'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ];
    }

    public function getCategoryId(): ?int
    {
        return $this->input('category_id');
    }
}
