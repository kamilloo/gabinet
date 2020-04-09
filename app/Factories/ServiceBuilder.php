<?php

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Http\Requests\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Model;
use App\Models\Pricing;
use App\Models\PricingItem;
use App\Models\Service;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

class ServiceBuilder extends AbstractBuilder
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
     * @param EntryDataProvider|ServiceRequest $request
     */
    protected function setAttribute(EntryDataProvider $request)
    {
        $this->instance->fill([
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'category_id' => $request->getCategoryId()
        ]);
    }
}
