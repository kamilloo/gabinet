<?php

namespace Tests\Feature\Controllers\PortfolioController\Destroy;

use App\Comment;
use App\Http\Resources\UserResource;
use App\Mail\Test;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Portfolio;
use App\Models\Tag;
use App\Movie;
use App\Notifications\TestNootification;
use App\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Filesystem\FilesystemManager;
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
    /**
     * @var FilesystemManager
     */
    private $file_manager;
    /**
     * @var \Illuminate\Http\Testing\FileFactory
     */
    private \Illuminate\Http\Testing\FileFactory $upload_file;
    /**
     * @var \Illuminate\Config\Repository
     */
    private $shares_directory;
    /**
     * @var \Illuminate\Config\Repository
     */
    private $image_directory;
    /**
     * @var string
     */
    private string $inner_directory;
    /**
     * @var \Illuminate\Config\Repository
     */
    private $disk;

    /**
     * @var Portfolio
     */
    private $portfolio;

    protected function setUp()
    {
        parent::setUp();
        $this->user = $this->createAndBeUser();
        $this->portfolio = factory(Portfolio::class)->create();
        $this->file_manager = $this->app['filesystem'];
        $this->upload_file = UploadedFile::fake();

        $this->fileManagerConfig();
    }

    /**
     * @test
     */
    public function store_model()
    {
        //Given
        $file = $this->upload_file->image('image.png');
        //when
        $filepath = $this->whenUploadFile($file);
        $this->portfolio->filepath = $filepath;
        $this->portfolio->save();

        //Then
        $response = $this->sendPortfolioDeleteRequest($this->portfolio);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Zdjęcie zostało usunięte.');
        $this->assertFileMissing($filepath);

    }

    /**
     * @test
     */
    public function remove_portfolio_tags()
    {
        //Given
        $tag = factory(Tag::class)->create();
        //when
        $this->portfolio->tags()->attach($tag);

        //Then
        $response = $this->sendPortfolioDeleteRequest($this->portfolio);

        //Assert
        $this->assertTagsMissing($tag);

    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function sendPortfolioDeleteRequest(Portfolio $portfolio): \Illuminate\Foundation\Testing\TestResponse
    {
        Arr::set($data, '_token',csrf_token());
        return $this->delete(route('portfolio.destroy', $portfolio));
    }

    protected function whenUploadFile(\Illuminate\Http\Testing\File $file):string
    {
        $upload_path = implode(DIRECTORY_SEPARATOR, [
            $this->image_directory,
            $this->inner_directory
        ]);
        return $this->file_manager->disk($this->disk)->putFile($upload_path, $file);
    }

    protected function fileManagerConfig(): void
    {
        $this->shares_directory = config('lfm.shared_folder_name');
        $this->image_directory = config('lfm.folder_categories.image.folder_name');
        $this->inner_directory = 'inner';
        $this->disk = config('lfm.disk');
        $this->file_manager->disk($this->disk);
    }

    private function assertFileMissing(string $file_path)
    {
        $this->assertFalse($this->file_manager->disk($this->disk)->exists($file_path));
    }

    private function assertTagsMissing(Tag $tag)
    {
        $this->assertFalse($tag->portfolio()->exists());
        $this->assertTrue($tag->exists);
    }

}
