<?php

namespace App\Http\Requests;


use App\Contracts\CertificateRequestDataProvider;
use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;
use App\Http\Requests\Concerns\TitleAndDescriptionDataTrait;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;
use Illuminate\Validation\Rule;

class CertificateRequest extends Request implements CertificateRequestDataProvider
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
        ];
    }

}
