<?php

declare(strict_types = 1);

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostServiceApplicationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function 有資料取title欄位資料()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $this->visit('post/1');

        /** assert */
        $this->see('Title : title1');
    }

    /** @test */
    public function 無資料的title欄位資料()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $this->visit('post/4');

        /** assert */
        $this->see('Title : no title');
    }
}
