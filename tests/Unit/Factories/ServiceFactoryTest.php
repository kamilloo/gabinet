<?php

namespace Tests\Feature\Controllers;

use App\Comment;
use App\Contracts\EntryDataProvider;
use App\Factories\ServiceFactory;
use App\Http\Resources\UserResource;
use App\Mail\Test;
use App\Models\Portfolio;
use App\Movie;
use App\Notifications\TestNootification;
use App\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Arr;
use Mockery as m;
use phpDocumentor\Reflection\Types\Void_;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Model was added
 * Attributes were stored in db
 * File existing
 * File copied
 * File renamed
 */
class ServiceFactoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var ServiceFactory
     */
    private $service_factory;
    /**
     * @var m\LegacyMockInterface|m\MockInterface|EntryDataProvider
     */
    private $data_provider;

    /**
     * @var FilesystemAdapter
     */
    private $file_manager;
    /**
     * @var \Illuminate\Http\Testing\FileFactory
     */
    private \Illuminate\Http\Testing\FileFactory $upload_file;
    /**
     * @var string
     */
    private $shares_directory;
    /**
     * @var string
     */
    private $image_directory;
    /**
     * @var string
     */
    private string $inner_directory;
    /**
     * @var string
     */
    private $disk;

    public function entryData():iterable
    {
        yield [[
            'title' => 'title'
        ]];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->service_factory = $this->app->make(ServiceFactory::class);
        $this->data_provider = m::mock(EntryDataProvider::class);
        $this->file_manager = $this->app['filesystem'];
        $this->upload_file = UploadedFile::fake();
        $this->shares_directory = config('lfm.shared_folder_name');
        $this->image_directory = config('lfm.folder_categories.image.folder_name');
        $this->inner_directory = 'inner';
        $this->disk = config('lfm.disk');
    }


    /**
     *
     * @dataProvider entryData
     * @test
     */
    public function create_set_attributes(array $entry_data)
    {
        //When
        $this->provideEntryData($entry_data);

        //Then
        $this->service_factory->create($this->data_provider);

        //Assert
        $this->assertDatabaseHas('services', [
            'title' => Arr::get($entry_data, 'title')
        ]);
    }

    /**
     *
     * @dataProvider entryData
     * @test
     */
    public function create_set_file(array $entry_data)
    {
        //Given
        $file = $this->upload_file->image('image.png');

        //When
        [$url, $file] = $this->whenUploadFile($file);
        $this->provideEntryData($entry_data);

        //Then
        $this->service_factory->create($this->data_provider);

        //Assert
        $this->assertDatabaseHas('services', [
            'title' => Arr::get($entry_data, 'title'),
            'filepath' => ''
        ]);

//        $this->assertFileExists($file->getPath());
    }

    private function provideEntryData(array $entry_data):void
    {
        $this->data_provider->shouldReceive('getTitle')->once()->andReturn(Arr::get($entry_data, 'title'));
        $this->data_provider->shouldReceive('getDescription')->once()->andReturn(Arr::get($entry_data, 'description'));
        $this->data_provider->shouldReceive('getCategoryId')->once()->andReturn(Arr::get($entry_data, 'category_id'));
        $this->data_provider->shouldReceive('getFilepath')->once()->andReturn(Arr::get($entry_data, 'filepath'));
    }

    protected function whenUploadFile(\Illuminate\Http\Testing\File $file):array
    {
        $upload_path = implode(DIRECTORY_SEPARATOR, [
            $this->image_directory,
            $this->inner_directory
        ]);
        $upload_file = $this->file_manager->putFile($upload_path, $file);
        $url = $this->file_manager->disk($this->disk)->url($upload_file);

        return [$url, $upload_file];
    }

}
