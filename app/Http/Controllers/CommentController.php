<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Fox;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Fox $fox) {

        request()->validate([
            "content"=> "required|min:5|max:240",
        ]);

        $Comment = Comment::create(
            [
                'content'=> request()->get("content",""),
                'fox_id'=> $fox->id,
            ]
        );

        return redirect()->route("fox.show",$fox->id)->with("success","Fox create successfully!");
    }
}
