<?php

namespace Tests\Feature\Controllers\PortfolioController\Store;

use App\Comment;
use App\Http\Resources\UserResource;
use App\Mail\Test;
use App\Models\Portfolio;
use App\Movie;
use App\Notifications\TestNootification;
use App\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortfolioControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var User
     */
    private $user;
    /**
     * @var \Illuminate\Http\Testing\FileFactory
     */
    private \Illuminate\Http\Testing\FileFactory $upload_manager;
    /**
     * @var \Illuminate\Http\Testing\FileFactory
     */
    private \Illuminate\Http\Testing\FileFactory $upload_file;
    private $file_manager;
    /**
     * @var \Illuminate\Config\Repository
     */
    private $shares_directory;
    /**
     * @var \Illuminate\Config\Repository
     */
    private $image_directory;
    /**
     * @var string
     */
    private string $inner_directory;
    /**
     * @var \Illuminate\Config\Repository
     */
    private $disk;

    public function invalidEntryData():iterable
    {
        yield 'empty data' => [[
           'tags' => [],
        ]];

        yield 'invalid data' => [[
            'filepath' => false,
            'tags' => false,
        ]];
    }

    public function entryData()
    {
        yield 'valid data' => [[
            'filepath' => 'filepath',
            'tags' => 'string',
        ]];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();

        $this->file_manager = $this->app['filesystem'];
        $this->upload_file = UploadedFile::fake();

        $this->fileManagerConfig();
    }

    /**
     * @test
     * @dataProvider invalidEntryData
     */
    public function store_validation_exception(array $data)
    {
        $response = $this->sendPortfolioStoreRequest($data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('filepath');
        $response->assertSessionHasErrors('tags');

    }

    /**
     * @test
     * @dataProvider entryData
     */
    public function store_model(array $entry)
    {
        //Given
        $file = $this->upload_file->image('image.png');

        //When
        $url = $this->whenUploadFile($file);
        $entry['filepath'] = $url;

        //Then
        $response = $this->sendPortfolioStoreRequest($entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Zdjęcie zostało dodane.');

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendPortfolioStoreRequest(array $data): \Illuminate\Foundation\Testing\TestResponse
    {
        Arr::set($data, '_token',csrf_token());
        return $this->post(route('portfolio.store'), $data);
    }


    protected function whenUploadFile(\Illuminate\Http\Testing\File $file):string
    {
        $upload_path = implode(DIRECTORY_SEPARATOR, [
            $this->image_directory,
            $this->inner_directory
        ]);
        $filepath = $this->file_manager->disk($this->disk)->putFile($upload_path, $file);
        return $this->file_manager->disk($this->disk)->url($filepath);
    }

    protected function fileManagerConfig(): void
    {
        $this->shares_directory = config('lfm.shared_folder_name');
        $this->image_directory = config('lfm.folder_categories.image.folder_name');
        $this->inner_directory = 'inner';
        $this->disk = config('lfm.disk');
        $this->file_manager->disk($this->disk);
    }

}
