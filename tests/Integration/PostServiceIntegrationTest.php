<?php

declare(strict_types = 1);

use App\Post;
use App\Services\PostService;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostServiceIntegrationTest extends TestCase
{
    use DatabaseMigrations;

    /** @var PostService */
    private $target;

    protected function setUp()
    {
        parent::setUp();
        $this->target = app(PostService::class);
    }

    /** @test */
    public function 有資料取title欄位資料()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $actual = $this->target->showTitle(1, 'no title');

        /** assert */
        $this->assertEquals('title1', $actual);
    }

    /** @test */
    public function 無資料的title欄位資料()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $actual = $this->target->showTitle(4, 'no title');

        /** assert */
        $this->assertEquals('no title', $actual);
    }
}
