<?php


namespace App\Http\Requests\Concerns;


use App\Http\Requests\PortfolioUpdateRequest;
use App\Http\Requests\ServiceRequest;

trait NameEntryDataTrait
{
    public function getName(): string
    {
        return $this->input('name');
    }
}
