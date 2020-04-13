<?php
declare(strict_types=1);

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;
use App\Factories\Concerns\CertificateConcern;
use App\Factories\Concerns\ServiceConcern;
use App\Http\Requests\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Certificate;
use App\Models\Model;
use App\Models\Pricing;
use App\Models\PricingItem;
use App\Models\Service;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class CertificateFactory extends AbstractFactory
{
    use CertificateConcern;
    /**
     * @return Model|Certificate|\Illuminate\Database\Eloquent\Model
     */
    protected function createModel():Model
    {
        return Certificate::newModelInstance();
    }
}
