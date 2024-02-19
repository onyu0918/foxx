<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Fox;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(CreateCommentRequest $request,Fox $fox) {

        $validated = $request->validated();
        // $Comment = Comment::create(
        //     [
        //         'content'=> request()->get("content",""),
        //         'fox_id'=> $fox->id,
        //     ]
        // );

        $comment = new Comment();
        $comment->fox_id = $fox->id;
        $comment->user_id = auth()->id();
        $comment->content = $validated['content'];
        $comment->save();


        return redirect()->route("fox.show",$fox->id)->with("success","Fox create successfully!");
    }
}
