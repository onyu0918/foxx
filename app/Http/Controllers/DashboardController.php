<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Fox;

class DashboardController extends Controller
{

    public function index() {
        $foxx = Fox::orderBy('created_at','DESC');

        if(request()->has("search")) {
            $foxx = $foxx->where("content","LIKE","%".request()->get('search','')."%");
        }


        return view('dashboard',[
            'foxx'=> $foxx->paginate(5)
        ]);
    }

}
