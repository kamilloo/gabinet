<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Factories\Concerns\ModelFileConcern;
use App\Http\Requests\Request;
use App\Models\FileModel;
use App\Models\Model;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\File;

abstract class AbstractBuilder
{
    use ModelFileConcern;
    /**
     * @var Model
     */
    protected $instance;
    /**
     * @var Connection
     */
    protected $db;
    /**
     * @var Log
     */
    protected $logger;
    /**
     * @var FilesystemManager
     */
    protected $storage;

    /**
     * AbstractFactory constructor.
     *
     * @param Connection $db
     * @param Log $logger
     */
    public function __construct(Connection $db, Log $logger, FilesystemManager $storage)
    {
        $this->db = $db;
        $this->logger = $logger;
        $this->storage = $storage;
        $this->drive = config('lfm.disk');

    }

    public function update(EntryDataProvider $data_provider, FileModel $model):bool {

        try{
            return $this->db->transaction(function() use ($data_provider, $model) {

                $this->instance = $model;
                $this->setAttribute($data_provider);
                $this->setFile($data_provider);
                return $this->save();
            });
        } catch (\Throwable $exception)
        {
            $this->logger->error($exception->getMessage());
            return false;
        }
    }

    abstract protected function setAttribute(EntryDataProvider $request);

}
