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
        $response = $this->sendPortfolioStoreRequest($entry);
        $response->assertStatus(200);

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

}
