<?php


namespace App\Http\Requests\Concerns;


use App\Http\Requests\PortfolioUpdateRequest;
use App\Http\Requests\ServiceRequest;

trait PositionEntryDataTrait
{
    public function position(): int
    {
        return $this->input('position');
    }
}
