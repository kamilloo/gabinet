<?php

namespace Tests\Feature\Controllers\Api\PricingItemController\Sortable;

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

class PricingItemControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Pricing
     */
    private $pricing;

    public function invalidEntryData():iterable
    {
        yield 'empty data' => [[
        ]];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();
        $this->pricing = factory(Pricing::class)->create();
    }

    /**
     * @test
     * @dataProvider invalidEntryData
     */
    public function store_validation_exception(array $data)
    {
        $response = $this->sendSortablePricingItemsRequest($this->pricing, $data);
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
        $first_item = $this->createPricingItem($this->pricing);
        $second_item = $this->createPricingItem($this->pricing);

        //When
        $entry = [
            'payload' => [
                $first_item->toArray(),
                $second_item->toArray(),
            ]
        ];

        //Then
        $response = $this->sendSortablePricingItemsRequest($this->pricing, $entry);

        //Assert
        $this->assertSortable($first_item, $second_item);
    }

    /**
     * @test
     */
    public function desc_sortable_items()
    {
        //Given
        $first_item = $this->createPricingItem($this->pricing);
        $second_item = $this->createPricingItem($this->pricing);

        //When
        $entry = [
            'payload' => [
                $second_item->toArray(),
                $first_item->toArray(),
            ]
        ];

        //Then
        $response = $this->sendSortablePricingItemsRequest($this->pricing, $entry);

        //Assert
        $this->assertSortable($second_item, $first_item);
    }



    /**
     * @test
     */
    public function store_model()
    {
        $entry = [
            'payload' => [
                $this->pricing->toArray()
            ]
        ];

        //Then
        $response = $this->sendSortablePricingItemsRequest($this->pricing, $entry);

        //Assert
        $response->assertStatus(200);

        $response->assertJson(['message' => 'Cennik został zapisany.']);

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendSortablePricingItemsRequest(Pricing $pricing, array $data): \Illuminate\Foundation\Testing\TestResponse
    {
        return $this->postJson(route('pricing.items.sortable', $pricing), $data);
    }

    private function createPricingItem(Pricing $pricing):PricingItem
    {
        $item = $this->makePricingItem();
        $pricing->items()->save($item);
        return $item;
    }

    private function makePricingItem():PricingItem
    {
        return factory(PricingItem::class)->make();
    }

    private function assertSortable(PricingItem $first_item, PricingItem $second_item)
    {
        $this->assertDatabaseHas('pricing_items', [
            'id' => $first_item->id,
            'pricing_id' => $this->pricing->id,
            'position' => 0,
        ]);

        $this->assertDatabaseHas('pricing_items', [
            'id' => $second_item->id,
            'pricing_id' => $this->pricing->id,
            'position' => 1,
        ]);
    }

}
