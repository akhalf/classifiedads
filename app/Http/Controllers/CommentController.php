<?php

namespace App\Http\Controllers;

use App\Repositories\Comments\CommentsInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comments;

    public function __construct(CommentsInterface $comments)
    {
        $this->comments = $comments;
    }

    public function store(Request $request)
    {
        $this->comments->add($request);

        return back();
    }

    public function replay(Request $request)
    {
        $this->comments->addReplay($request);

        return back();
    }
}
