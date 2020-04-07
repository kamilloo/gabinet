<?php

namespace Tests\Unit\Controllers\ServiceController\Store;

use App\Comment;
use App\Factories\AbstractFactory;
use App\Factories\ServiceFactory;
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
use Mockery as m;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceControllerTest extends TestCase
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
            'title' => false,
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
        $this->factory = m::mock(ServiceFactory::class);
        $this->instance(ServiceFactory::class, $this->factory);
    }

    /**
     * @test
     * @dataProvider invalidEntryData
     */
    public function store_validation_exception(array $data)
    {
        $response = $this->sendServiceStoreRequest($data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');

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
        $response = $this->sendServiceStoreRequest($entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Usługa została dodana.');
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
        $response = $this->sendServiceStoreRequest($entry);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHasErrors(null, 'Usługa nie została dodana.');
    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendServiceStoreRequest(array $data): \Illuminate\Foundation\Testing\TestResponse
    {
        Arr::set($data, '_token',csrf_token());
        return $this->post(route('services.store'), $data);
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
