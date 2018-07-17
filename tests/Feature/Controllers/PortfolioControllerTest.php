<?php

namespace Tests\Feature\Controllers;

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
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortfolioControllerTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function delete_model()
    {
        $this->startSession();
        $portfolio = factory(Portfolio::class)->create();

        $data = [
            '_method' => 'DELETE',
            '_token' => csrf_token()
        ];
        $this->post(route('portfolio.destroy', $portfolio), $data, ['HTTP_X-CSRF-TOKEN' => csrf_token()])->assertRedirect(route('portfolio.index'));
    }

    /** @test */
    public function store_model()
    {
        $this->startSession();
        $portfolio = factory(Portfolio::class)->create();

        $data = [
            '_token' => csrf_token()
        ];
        $this->post(route('portfolio.store'), $data, ['HTTP_X-CSRF-TOKEN' => csrf_token()]);

    }

}
