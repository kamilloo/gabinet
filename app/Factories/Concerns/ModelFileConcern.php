<?php


namespace App\Factories\Concerns;


use App\Contracts\EntryDataProvider;
use App\Factories\AbstractFactory;
use App\Factories\ServiceBuilder;
use App\Http\Requests\ServiceRequest;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\File;

trait ModelFileConcern
{

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
                    $this->disk()->delete($old_file);

                }

            }
        }
    }
}
