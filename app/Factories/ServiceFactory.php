<?php
declare(strict_types=1);

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Contracts\ServiceRequestDataProvider;
use App\Http\Requests\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Model;
use App\Models\Pricing;
use App\Models\PricingItem;
use App\Models\Service;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class ServiceFactory extends AbstractFactory
{
    /**
     * @var Service
     */
    protected $service;

    public function __construct(Connection $db, Log $logger, FilesystemManager $storage, Service $service)
    {
        parent::__construct($db, $logger, $storage);
        $this->service = $service;
    }

    /**
     * @return Model|Service
     */
    protected function createModel():Model
    {
        return $this->service->newInstance();
    }

    /**
     * @param EntryDataProvider|ServiceRequestDataProvider $data_provider
     */
    protected function setAttribute(EntryDataProvider $data_provider):void
    {
        $this->instance->fill([
            'title' => $data_provider->getTitle(),
            'description' => $data_provider->getDescription(),
            'category_id' => $data_provider->getCategoryId(),
        ]);
    }
}
