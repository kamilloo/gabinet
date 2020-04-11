<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Contracts\FileModelInterface;
use App\Factories\Concerns\ModelFileConcern;
use App\Http\Requests\Request;
use App\Models\Model;
use GuzzleHttp\Psr7\Uri;
use http\Url;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\File;
use Illuminate\Support\Arr;
use Psr\Http\Message\UriInterface;
use Symfony\Component\Finder\SplFileInfo;

abstract class AbstractFactory
{
    use ModelFileConcern;
    /**
     * @var Model|FileModelInterface
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
     * @var string
     */
    private $drive;

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

    public function create(EntryDataProvider $data_provider): bool {

        try{
            return $this->db->transaction(function() use ($data_provider) {

                $this->instance = $this->createModel();
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

    abstract protected function createModel():Model;
    abstract protected function setAttribute(EntryDataProvider $data_provider):void;

}
