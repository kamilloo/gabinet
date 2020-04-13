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

abstract class AbstractRemover
{
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

    public function destroy(Model $model): bool {

        try{
            return $this->db->transaction(function() use ($model) {

                $this->instance = $model;
                $this->removeFile();
                $this->delete();
                return true;
            });
        } catch (\Throwable $exception)
        {
            $this->logger->error($exception->getMessage());
            return false;
        }
    }


    /**
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected function disk(): \Illuminate\Contracts\Filesystem\Filesystem
    {
        return $this->storage->drive($this->drive);
    }

    protected function removeFile()
    {
        $old_file = $this->instance->filepath;
        if ($this->disk()->exists($old_file))
        {
            $this->disk()->delete($old_file);
        }
    }

    private function delete():bool
    {
        return $this->instance->delete();
    }

}
