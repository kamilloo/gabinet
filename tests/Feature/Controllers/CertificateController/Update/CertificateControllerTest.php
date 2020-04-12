<?php

namespace Tests\Feature\Controllers\CertificateController\Update;

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

class CertificateControllerTest extends TestCase
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

    /**
     * @var Service
     */
    private $service;

    public function invalidEntryData():iterable
    {
        yield 'empty data' => [[
        ]];

        yield 'invalid data' => [[
            'title' => false,
            'category_id' => false,
        ]];
    }

    public function entryData()
    {
        yield 'valid data' => [[
            'title' => 'title',
        ]];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();
        $this->service = factory(Service::class)->create();
    }

    /**
     * @test
     * @dataProvider invalidEntryData
     */
    public function store_validation_exception(array $data)
    {
        $response = $this->sendServiceUpdateRequest($this->service, $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('category_id');
        $response->assertSessionHasErrors('title');

    }

    /**
     * @test
     * @dataProvider entryData
     */
    public function store_model(array $entry)
    {
        //Given
        $entry['category_id'] = factory(Category::class)->create()->id;

        //Then
        $response = $this->sendServiceUpdateRequest($this->service, $entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Usługa została zapisana.');

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendServiceUpdateRequest(Service $portfolio, array $data): \Illuminate\Foundation\Testing\TestResponse
    {
        Arr::set($data, '_token',csrf_token());
        return $this->put(route('services.update', $portfolio), $data);
    }

}
