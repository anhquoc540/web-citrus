<?php

namespace App\Http\Services\Base\Comment;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Services\Base\Custom\QueryCustom;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    protected $queryCustom;
    public function __construct(QueryCustom $queryCustom)
    {
        $this->queryCustom = $queryCustom;
    }

    public function getList($postId, $perPage, $pageNumber)
    {
        $listComment = Comment::where('post_id', $postId)->paging($perPage, $pageNumber);
        foreach ($listComment['data'] as $key => $comment) {
            $comment->user;
        }
        $listComment['data'] = $this->formatComments($listComment['data']);

        return $listComment;
    }

    public function create($request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::user()->id;

        return Comment::create($data);
    }

    public function formatComments($list, $parentId = 0)
    {
        $html = '';
        $arrParent = [];

        foreach ($list as $key => $value) {
            // get comment parent
            if($value->parent_id == $parentId) {
                $arrParent[] = $value;

                // delete comment parent in array
                unset($list[$key]);
                // call again function formatComments to get comment children have parent is parent delete above $value->id
                $arrChild = self::formatComments($list, $value->id);
                if(count($arrChild) > 0) {
                    $arrParent['child-' . $value->id] = $arrChild;
                }
            }
        }

        return $arrParent;
    }
}
