<?php

namespace Tests\Feature\Controllers;

use App\Comment;
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
use Mockery as m;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceFactoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var ServiceFactory
     */
    private $service_factory;
    /**
     * @var m\LegacyMockInterface|m\MockInterface
     */
    private $data_provider;

    public function entryData():iterable
    {
        yield [

        ];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->service_factory = $this->app->make(ServiceFactory::class);
        $this->data_provider = m::mock();
    }


    /**
     * @dataProvider entryData
     * @test
     */
    public function create_set_attributes()
    {
        $this->service_factory->create($this->data_provider);

        $this->assertDatabaseHas('services', [

        ])
    }

}
