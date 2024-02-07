<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fox;

class DashboardController extends Controller
{

    public function index() {
        return view('dashboard',[
            'foxx'=> Fox::orderBy('created_at','DESC')->get()
        ]);
    }

}
