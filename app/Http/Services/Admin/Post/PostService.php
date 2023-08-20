<?php

namespace App\Http\Services\Admin\Post;

use App\Models\Post;
use App\Http\Services\Custom\QueryCustom;
use AlException;
use DB;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function getPost($all = null)
    {
        if($all) {
            $listPost = Post::all();
        } else {
            $listPost = Post::where('user_id', Auth::user()->id)->get();
        }

        foreach ($listPost as $key => $value) {
            $value->image = json_decode($value->image, true);
        }

        return $listPost;
        
    }

    public function detail($id)
    {
        $post = Post::find($id);
        $post->image = json_decode($post->image, true);

        $relatedPost = Post::where('id', '<>', $id)->orderBy('created_at', 'DESC')->limit(3)->get();
        foreach ($relatedPost as $key => $value) {
            $value->image = json_decode($value->image, true);
        }

        return ['post' => $post, 'relatedPost' => $relatedPost];
    }

}
