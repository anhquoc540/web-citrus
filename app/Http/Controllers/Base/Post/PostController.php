<?php

namespace App\Http\Controllers\Base\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Post\PostService;
use Exception;

class PostController extends Controller
{
    protected $post;
    public function __construct(PostService $post)
    {
        $this->post = $post;
    }

    //
    public function getList(Request $request)
    {
        try {
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;
            $all = $request->all;

            $result = $this->post->getList($all, $perPage, $pageNumber);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function created(Request $request)
    {
        //
        try {
            $result = $this->post->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function detail($id)
    {
        try {
            $result = $this->post->getDetail($id);
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
