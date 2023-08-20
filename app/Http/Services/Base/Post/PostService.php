<?php

namespace App\Http\Services\Base\Post;

use App\Models\Post;
use App\Http\Services\Base\Custom\QueryCustom;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function getList($all, $perPage, $pageNumber)
    {
        if($all) {
            $list = Post::paging($perPage, $pageNumber);
        } else {
            $list = Post::where('user_id', Auth::user()->id)->paging($perPage, $pageNumber);
        }
        
        foreach ($list['data'] as $key => $value) {
            $value->image = json_decode($value->image);
            $value->user;
        }
        
        return $list;
    }

    public function create($request)
    {
        $data = $request->input();
        $data['image'] = json_encode($data['image']);
        $data['user_id'] = Auth::user()->id;

        $post = Post::create($data);
        $post->image = json_decode($post->image);

        return $post;
    }

    public function getDetail($id)
    {
        $post = Post::find($id);
        if($post) {
            $post->image = json_decode($post->image);
            $post->user;
        }

        return $post;
    }
}
