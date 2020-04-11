<?php

namespace Tests\Unit\Controllers\PortfolioController\Store;

use App\Comment;
use App\Factories\AbstractFactory;
use App\Factories\PortfolioFactory;
use App\Factories\ServiceFactory;
use App\Http\Resources\UserResource;
use App\Mail\Test;
use App\Models\Category;
use App\Models\Portfolio;
use App\Movie;
use App\Notifications\TestNootification;
use App\Post;
use App\Models\Service;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Arr;
use Mockery as m;
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
     * @var AbstractFactory|m\LegacyMockInterface|m\MockInterface
     */
    private $factory;

    public function invalidEntryData():iterable
    {
        yield 'empty data' => [[
        ]];

        yield 'invalid data' => [[
            'filepath' => false,
        ]];
    }

    public function entryData():iterable
    {
        $faker = Factory::create();
        yield 'entry data' => [[
            'filepath' => $faker->url,
            'tags' => implode(',', $faker->words()),
        ]];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();
        $this->factory = m::mock(PortfolioFactory::class);
        $this->instance(PortfolioFactory::class, $this->factory);
    }

    /**
     * @test
     * @dataProvider invalidEntryData
     */
    public function store_validation_exception(array $data)
    {
        $response = $this->sendPortfolioStoreRequest($data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'filepath',
        ]);
    }

    /**
     * @test
     * @dataProvider entryData
     */
    public function store_model(array $entry)
    {
        //When
        $this->factoryCreatesService();

        //Then
        $response = $this->sendPortfolioStoreRequest($entry);

        //Assert
        $response->assertStatus(302);

        $response->assertSessionHas('status', 'Zdjęcie zostało dodane.');
    }


    /**
     * @test
     * @dataProvider entryData
     */
    public function store_factory_doesnt_save_model(array $entry)
    {
        //When
        $this->factoryDoesntCreatesService();

        //Then
        $response = $this->sendPortfolioStoreRequest($entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHasErrors(null, 'Zdjęcie nie zostało dodane.');
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

    private function factoryCreatesService()
    {
        $this->factory->shouldReceive('create')
            ->once()
            ->andReturn(True);
    }

    private function factoryDoesntCreatesService()
    {
        $this->factory->shouldReceive('create')
            ->once()
            ->andReturn(False);
    }
}
