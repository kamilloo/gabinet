<?php

namespace App\Http\Requests;


use App\Contracts\CertificateRequestDataProvider;
use App\Contracts\CertificateUpdateRequestDataProvider;
use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;
use App\Http\Requests\Concerns\PositionEntryDataTrait;
use App\Http\Requests\Concerns\TitleAndDescriptionDataTrait;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;
use Illuminate\Validation\Rule;

class CertificateUpdateRequest extends Request implements CertificateUpdateRequestDataProvider
{
    use UploadFileEntryDataTrait, TitleAndDescriptionDataTrait, PositionEntryDataTrait;

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
//            'position' => ['required', 'integer'],
        ];
    }

}
