<?php

namespace App\Http\Controllers\Base\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Base\Comment\CommentService;
use Exception;

class CommentController extends Controller
{
    protected $comment;
    public function __construct(CommentService $comment)
    {
        $this->comment = $comment;
    }

    //
    public function getList(Request $request)
    {
        try {
            $perPage = $request->perPage ? $request->perPage : PER_PAGE;
            $pageNumber = $request->pageNumber ? $request->pageNumber : PAGE_NUMBER;
            $postId = $request->post_id;

            $result = $this->comment->getList($postId, $perPage, $pageNumber);
            
            return $this->sendSuccessData($result, "success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }

    public function created(Request $request)
    {
        //
        try {
            $result = $this->comment->create($request);
            return $this->sendSuccessData($result, "create success");
        } catch (Exception $e) {
            return $this->exceptions($e);
        }
    }
}
