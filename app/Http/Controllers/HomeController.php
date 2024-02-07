<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Livewire\WithPagination;

class HomeController extends Controller
{
    use WithPagination;
    //
    public function __invoke(Request $request)
    {
        return view('home');
    }
}

