<?php

namespace Tests\Feature\Controllers\PricingController\Store;

use App\Comment;
use App\Http\Resources\UserResource;
use App\Mail\Test;
use App\Models\Category;
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

class PricingControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var User
     */
    private $user;
    /**
     * @var \Illuminate\Http\Testing\FileFactory
     */
    private $file_manager;

    /**
     * @var \Illuminate\Http\Testing\FileFactory
     */
    private \Illuminate\Http\Testing\FileFactory $upload_file;

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
        ]];

        yield 'invalid data' => [[
            'name' => false,
            'price_since' => false,
        ]];
    }

    public function entryData():iterable
    {
        yield 'valid data' => [[
            'name' => 'title',
            'price_since' => 10,
        ]];
    }


    public function entryPricingItemsData():iterable
    {
        yield 'valid data' => [[
            'name' => 'title',
            'price_since' => 10,
            'items' => [
                [
                    'title' => 'title',
                    'description' => 'title',
                    'price' => 10,
                    'link' => null,
                ],
            ],

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
        $response = $this->sendPricingStoreRequest($data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('price_since');

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
        $response = $this->sendPricingStoreRequest($entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Cennik został dodany.');
    }

    /**
     * @test
     * @dataProvider entryPricingItemsData
     */
    public function add_pricing_items(array $entry)
    {
        //Given

        //When

        //Then
        $response = $this->sendPricingStoreRequest($entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Cennik został dodany.');

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendPricingStoreRequest(array $data): \Illuminate\Foundation\Testing\TestResponse
    {
        Arr::set($data, '_token',csrf_token());
        return $this->post(route('pricing.store'), $data);
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
