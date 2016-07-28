<?php

declare(strict_types = 1);

use App\Repositories\PostRepository;
use App\Services\PostService;

class PostServiceUnitTest extends TestCase
{
    /** @var PostService */
    private $target;
    private $mock;

    protected function setUp()
    {
        parent::setUp();

        $this->mock = Mockery::mock(PostRepository::class);
        app()->instance(PostRepository::class, $this->mock);
        $this->target = app(PostService::class);
    }

    /** @test */
    public function 有資料取title欄位資料()
    {
        /** arrange */
        $this->mock->shouldReceive('getTitle')
            ->once()
            ->withAnyArgs()
            ->andReturn('title1');

        /** act */
        $actual = $this->target->showTitle(1, 'no title');

        /** assert */
        $this->assertEquals('title1', $actual);
    }

    /** @test */
    public function 無資料的title欄位資料()
    {
        /** arrange */
        $this->mock->shouldReceive('getTitle')
            ->once()
            ->withAnyArgs()
            ->andReturn('no title');

        /** act */
        $actual = $this->target->showTitle(4, 'no title');

        /** assert */
        $this->assertEquals('no title', $actual);
    }
}
