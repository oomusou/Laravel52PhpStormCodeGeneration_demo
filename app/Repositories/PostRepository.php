<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function getAllPosts() : Collection
    {
        return Post::all();
    }
}