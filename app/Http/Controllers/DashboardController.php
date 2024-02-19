<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Fox;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $foxx = Fox::when(request()->has('search'), function($query) {
            $query->search(request('search',''));
        })->orderBy('created_at', 'DESC')->paginate(5);

        return view('dashboard', [
            'foxx' => $foxx,
        ]);
    }
}
