<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }


    /**
     * Display a listing of the resource.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['title'] = $this->postService->showTitle($id, 'no title');
        return view('post.index', $data);


    }
}
