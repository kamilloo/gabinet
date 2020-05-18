<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Model;
use App\Models\Pricing;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use http\Encoding\Stream;
use Illuminate\Contracts\Support\Arrayable;

class PricingExporterService
{
    /**
     * @var Pricing
     */
    protected Pricing $pricing;

    public function __construct(Pricing $pricing)
    {
        $this->pricing = $pricing;
    }

    public function export():Arrayable
    {
        return $this->pricing
            ->newModelQuery()
            ->with(['items' => Model::orderByPosition()])
            ->orderBy('position')
            ->get();
    }
}
