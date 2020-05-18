<?php

namespace Tests\Feature\Controllers\Api\PricingController\Printing;

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


    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();
    }

    /**
     * @test
     */
    public function print_pricing()
    {
        $first_item = $this->createPricing();

        //Then
        $response = $this->sendPrintPricingRequest();

        //Assert
        $response->assertStatus(200);
    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendPrintPricingRequest(): \Illuminate\Foundation\Testing\TestResponse
    {
        return $this->get(route('pricing.printing'));
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

}
