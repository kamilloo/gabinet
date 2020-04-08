<?php

namespace App\Http\Requests;


use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;
use Illuminate\Validation\Rule;

class ServiceRequest extends Request implements ServiceRequestDataProvider
{
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

    public function getFilePath(): string
    {
        return $this->input('filepath') ?? '';
    }

    public function getTitle(): string
    {
        return $this->input('title');
    }

    public function getDescription(): ?string
    {
        return $this->input('description');
    }

    public function getCategoryId(): ?int
    {
        return $this->input('category_id');
    }
}
