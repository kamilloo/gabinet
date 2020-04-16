<?php

namespace Tests\Feature\Controllers\CategoryController\Destroy;

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

class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var User
     */
    private $user;
    /**
     * @var Category
     */
    private $category;

    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();
        $this->category = factory(Category::class)->create();
    }

    /**
     * @test
     */
    public function block_if_use_in_service()
    {
        //When
        $service = factory(Service::class)->make();
        $this->category->services()->save($service);

        //Then
        $response = $this->sendCategoryDeleteRequest($this->category);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('error','Kategoria posiada usługi.');

    }

    /**
     * @test
     */
    public function store_model()
    {
        //Given

        //Then
        $response = $this->sendCategoryDeleteRequest($this->category);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Kategoria usunięta.');

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendCategoryDeleteRequest(Category $category): \Illuminate\Foundation\Testing\TestResponse
    {
        Arr::set($data, '_token',csrf_token());
        return $this->delete(route('categories.destroy', $category));
    }

}
