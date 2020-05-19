<?php
declare(strict_types=1);

namespace App\Services;

use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use http\Encoding\Stream;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Response;

class PdfService
{
    /**
     * @var PDF
     */
    protected PDF $pdf;

    public function __construct(PDF $pdf)
    {

        $this->pdf = $pdf;
    }

    public function render(Arrayable $payload)
    {
//        return $this->pdf
//            ->loadView('pdf.pricing', compact('payload'))
//            ->download('pricing.pdf')
            ;
        return view('pdf.pricing', compact('payload'));

    }
}
