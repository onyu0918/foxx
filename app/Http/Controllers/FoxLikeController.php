<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fox;
use Illuminate\Http\Request;

class FoxLikeController extends Controller
{
    public function like(Fox $fox) {

        $liker = auth()->user();

        $liker->likes()->attach($fox);

        return redirect()
            ->route('dashboard')
            ->with('success', 'successfully');

    }

    public function unlike(Fox $fox) {
        $liker = auth()->user();

        $liker->likes()->detach($fox);

        return redirect()
            ->route('dashboard')
            ->with('success', 'successfully');

    }
}
