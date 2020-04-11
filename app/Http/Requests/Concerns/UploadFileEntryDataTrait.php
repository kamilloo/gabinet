<?php


namespace App\Http\Requests\Concerns;


use App\Http\Requests\ServiceRequest;

trait UploadFileEntryDataTrait
{

    public function getFilePath(): string
    {
        return $this->input('filepath') ?? '';
    }
}
