<?php

declare(strict_types=1);

namespace App\Factories;

use App\Http\Requests\Request;
use App\Models\FileModel;
use App\Models\Model;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

abstract class AbstractBuilder
{
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
    }

    public function update(Request $request, FileModel $model){

        try{
            $this->db->transaction(function() use ($request, $model) {

                $this->instance = $model;
                $this->setAttribute($request);
                $this->setFile($request);
                $this->save();
            });
        } catch (\Throwable $exception)
        {
            $this->logger->error($exception->getMessage());
        }
        return $this->instance;
    }

    abstract protected function setAttribute(Request $request);

    protected function setFile(Request $request){

        if ($request->filepath) {
            $old_file = $this->instance->path;
            $file_name = basename($request->filepath);
            $path = $this->instance->getStoragePath() . basename($file_name);
            $this->storage->disk('storage')
                ->put($path, $this->storage->disk('file-manager')->get($file_name));

            $this->instance->fill([
                'disk' => 'storage',
                'file' => $file_name,
                'path' => $path
            ]);

            $this->storage->disk('file-manager')->delete($file_name);
            $this->storage->disk('file-manager')->delete($old_file);
        }
    }

    protected function save()
    {
        $this->instance->save();
    }

}