<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Post\PostService;

class PostController extends Controller
{
    //
    protected $post;
    public function __construct(PostService $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $result = $this->post->getPost();
        return view('expert.post.index', ['title' => 'Danh Sách Bài Viết', 'data' => $result]);
    }

    public function allPost()
    {
        $result = $this->post->getPost(1);
        return view('expert.post.index', ['title' => 'Danh Sách Bài Viết', 'data' => $result]);
    }

    public function detail($id)
    {
        $result = $this->post->detail($id);
        return view('expert.post.detail', ['title' => 'Chi Tiết Bài Viết', 'data' => $result]);
    }
}
