<?php

namespace Tests\Feature\Controllers\PortfolioController\Update;

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

    /**
     * @var Portfolio
     */
    private $portfolio;

    public function invalidEntryData():iterable
    {
        yield 'empty data' => [[
           'tags' => [],
        ]];

        yield 'invalid data' => [[
            'position' => false,
            'tags' => false,
        ]];
    }

    public function entryData()
    {
        yield 'valid data' => [[
            'position' => 1,
            'tags' => 'string',
        ]];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();
        $this->portfolio = factory(Portfolio::class)->create();
    }

    /**
     * @test
     * @dataProvider invalidEntryData
     */
    public function store_validation_exception(array $data)
    {
        $response = $this->sendPortfolioUpdateRequest($this->portfolio, $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('position');
        $response->assertSessionHasErrors('tags');

    }

    /**
     * @test
     * @dataProvider entryData
     */
    public function store_model(array $entry)
    {
        //Then
        $response = $this->sendPortfolioUpdateRequest($this->portfolio, $entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Zmiany zostały zapisane.');

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendPortfolioUpdateRequest(Portfolio $portfolio, array $data): \Illuminate\Foundation\Testing\TestResponse
    {
        Arr::set($data, '_token',csrf_token());
        return $this->put(route('portfolio.update', $portfolio), $data);
    }

}
