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

    public function detroy(Model $model): bool {

        try{
            return $this->db->transaction(function() use ($model) {

                $this->instance = $model;
                $this->setFile();
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

    protected function setFile(EntryDataProvider $data_provider)
    {
        $file_url = $data_provider->getFilePath();
        if (!empty($file_url)) {
            $parsed_url = new Uri($file_url);
            $path = trim($parsed_url->getPath(), DIRECTORY_SEPARATOR);
            $segments = explode(DIRECTORY_SEPARATOR, $path);

            $first_segment = array_shift($segments);
            $filepath = implode(DIRECTORY_SEPARATOR, $segments);

            if ($first_segment == 'storage' && $this->disk()->exists($filepath)) {
                $file_info = new File($filepath, false);
                $to = implode(DIRECTORY_SEPARATOR, [
                    $this->instance->getStoragePath(),
                    implode('.', [bin2hex(openssl_random_pseudo_bytes(16)), $file_info->getExtension()]),
                ]);
                $copied = $this->disk()->copy($filepath, $to);
                if ($copied)
                {
                    $old_file = $this->instance->filepath;
                    $this->instance->fill([
                        'filepath' => $to,
                    ]);
                    if ($this->disk()->exists($old_file))
                    {
                        $this->disk()->delete($old_file);
                    }

                }

            }
        }
    }

    private function delete():bool
    {
        return $this->instance->delete();
    }

}
