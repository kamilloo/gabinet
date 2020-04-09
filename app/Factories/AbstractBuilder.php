<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\EntryDataProvider;
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

    protected function setFile(EntryDataProvider $data_provider){

        $file_url = $data_provider->getFilePath();
        if (!empty($file_url))
        {
            $parsed_url = new Uri($file_url);
            $path = trim($parsed_url->getPath(), DIRECTORY_SEPARATOR);
            $segments = explode(DIRECTORY_SEPARATOR, $path);

            $first_segment = array_shift($segments);
            $filepath = implode(DIRECTORY_SEPARATOR, $segments);

            if ($first_segment == 'storage' && $this->disk()->exists($filepath))
            {
                $file_info = new File($filepath, false);
                $to = implode(DIRECTORY_SEPARATOR, [
                    $this->instance->getStoragePath(),
                    implode('.',[bin2hex(openssl_random_pseudo_bytes(16)), $file_info->getExtension()]),
                ]);
                $copied = $this->disk()->copy($filepath, $to);
                if ($copied)
                    $old_file = $this->instance->filepath;
                    $this->instance->fill([
                            'filepath' => $to,
                    ]);
                    $this->disk()->delete($old_file);
            }
        }
    }

    protected function save():bool
    {
        return $this->instance->save();
    }

    /**
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected function disk(): \Illuminate\Contracts\Filesystem\Filesystem
    {
        return $this->storage->drive($this->drive);
    }

}
