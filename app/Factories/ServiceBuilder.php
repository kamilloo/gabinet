<?php

namespace App\Factories;

use App\Http\Requests\Request;
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

    protected function setAttribute(Request $request)
    {
        $this->instance->fill([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
    }
}