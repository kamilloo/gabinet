<?php

namespace App\Http\Requests;


use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;

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
            'title' => ['required', 'string']
        ];
    }

    public function getStoragePath(): string
    {
        // TODO: Implement getStoragePath() method.
    }

    public function getTitle(): string
    {
        return $this->input('title');
    }
}
