<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fox;
use Illuminate\Http\Request;

class FeedController extends Controller
{

    public function __invoke(Request $request)
    {

        $followingIDs = auth()->user()->followings()->pluck('user_id');
        $foxx = Fox::whereIn('user_id',$followingIDs)->latest();

        if(request()->has("search")) {
            $foxx = $foxx->where("content","LIKE","%".request()->get('search','')."%");
        }


        return view('dashboard',[
            'foxx'=> $foxx->paginate(5)
        ]);
    }
}
