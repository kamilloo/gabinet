<?php

namespace Tests\Unit\Service\PricingExporterService;

use App\Comment;
use App\Contracts\EntryDataProvider;
use App\Factories\ServiceFactory;
use App\Http\Resources\UserResource;
use App\Mail\Test;
use App\Models\Portfolio;
use App\Models\Pricing;
use App\Models\PricingItem;
use App\Movie;
use App\Notifications\TestNootification;
use App\Post;
use App\Models\Service;
use App\Models\User;
use App\Services\PricingExporterService;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Arr;
use Mockery as m;
use phpDocumentor\Reflection\Types\Void_;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PricingExporterServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PricingExporterService
     */
    private $service;

    protected function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make(PricingExporterService::class);
    }

    /**
     *
     * @test
     */
    public function export()
    {
        //Given
        $pricing = $this->createPricing([]);
        $item = $this->createPricingItem($pricing);

        //
        Pricing::whereRaw('1=1')->update(['position' => 2]);
        $pricing->position = 1;
        $pricing->save();

        //Then
        $exported = $this->service->export();

        //Assert
        $this->assertSame($pricing->id, $exported[0]->id);
        $this->assertSame($item->id, $exported[0]->items[0]->id);
    }

    private function createPricing(array $attributes):Pricing
    {
        return factory(Pricing::class)->create($attributes);
    }


    private function createPricingItem(Pricing $pricing):PricingItem
    {
        $item = $this->makePricingItem();
        $item->pricing()->associate($pricing)->save();
        return  $item;
    }

    private function makePricingItem():PricingItem
    {
        return factory(PricingItem::class)->make();
    }
}
