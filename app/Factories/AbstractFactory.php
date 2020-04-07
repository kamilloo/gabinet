<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\EntryDataProvider;
use App\Http\Requests\Request;
use App\Models\Model;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\Connection;
use Illuminate\Filesystem\FilesystemManager;

abstract class AbstractFactory
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

    public function create(EntryDataProvider $data_provider): bool {

        try{
            $this->db->transaction(function() use ($data_provider) {

                $this->instance = $this->createModel();
                $this->setAttribute($data_provider);
//                $this->setFile($data_provider);
                $this->save();
            });
        } catch (\Throwable $exception)
        {
            $this->logger->error($exception->getMessage());
            return false;
        }
        return true;
    }

    abstract protected function createModel():Model;
    abstract protected function setAttribute(EntryDataProvider $data_provider):void;

    protected function setFile(Request $request){
        $file_name =  basename($request->filepath);
        $path = $this->instance->getStoragePath().basename($file_name);
        $this->storage->disk('storage')->put($path,$this->storage->disk('file-manager')->get($file_name));

        $this->instance->fill([
            'disk' => 'storage',
            'file' => $file_name,
            'path' => $path
        ]);

        $this->storage->disk('file-manager')->delete($file_name);
    }

    protected function save()
    {
        $this->instance->save();
    }

}
