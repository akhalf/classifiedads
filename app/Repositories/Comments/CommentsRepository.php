<?php

namespace App\Repositories\Comments;

use App\Models\Comment;

class CommentsRepository implements CommentsInterface
{

    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function add($request)
    {
        $request->user()->comments()->create([
            'content' => $request->content,
            'ad_id' => $request->ad_id,
        ]);
    }

    public function addReplay($request)
    {
        $request->user()->comments()->create([
            'content' => $request->content,
            'ad_id' => $request->ad_id,
            'parent_id' => $request->parent_id,
        ]);
    }
}
