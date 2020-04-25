<?php

namespace Tests\Feature\Controllers\Api\PricingController\Sortable;

use App\Comment;
use App\Http\Resources\UserResource;
use App\Mail\Test;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Portfolio;
use App\Models\Pricing;
use App\Models\PricingItem;
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
    use DatabaseTransactions;

    /**
     * @var User
     */
    private $user;

    public function invalidEntryData():iterable
    {
        yield 'empty data' => [[
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
        $response = $this->sendSortablePricingRequest($data);
        $response->assertStatus(422);

        $response->assertJsonValidationErrors([
            'payload'
        ]);

    }

    /**
     * @test
     */
    public function asc_sortable_items()
    {
        //Given
        $first_item = $this->createPricing();
        $second_item = $this->createPricing();

        //When
        $entry = [
            'payload' => [
                $first_item->toArray(),
                $second_item->toArray(),
            ]
        ];

        //Then
        $response = $this->sendSortablePricingRequest($entry);

        //Assert
        $this->assertSortable($first_item, $second_item);
    }

    /**
     * @test
     */
    public function desc_sortable_items()
    {
        //Given
        $first_item = $this->createPricing();
        $second_item = $this->createPricing();

        //When
        $entry = [
            'payload' => [
                $second_item->toArray(),
                $first_item->toArray(),
            ]
        ];

        //Then
        $response = $this->sendSortablePricingRequest($entry);

        //Assert
        $this->assertSortable($second_item, $first_item);
    }



    /**
     * @test
     */
    public function store_model()
    {
        $first_item = $this->createPricing();

        $entry = [
            'payload' => [
                $first_item->toArray()
            ]
        ];

        //Then
        $response = $this->sendSortablePricingRequest($entry);

        //Assert
        $response->assertStatus(200);

        $response->assertJson(['message' => 'Cennik został zapisany.']);

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendSortablePricingRequest(array $data): \Illuminate\Foundation\Testing\TestResponse
    {
        return $this->postJson(route('pricing.sortable'), $data);
    }

    private function createPricing():Pricing
    {
        $item = $this->makePricing();
        $item->save();
        return $item;
    }

    private function makePricing():Pricing
    {
        return factory(Pricing::class)->make();
    }

    private function assertSortable(Pricing $first_item, Pricing $second_item)
    {
        $this->assertDatabaseHas('pricing', [
            'id' => $first_item->id,
            'position' => 0,
        ]);

        $this->assertDatabaseHas('pricing', [
            'id' => $second_item->id,
            'position' => 1,
        ]);
    }

}
