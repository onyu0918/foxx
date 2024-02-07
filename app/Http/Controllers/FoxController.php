<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fox;
use Illuminate\Http\Request;

class FoxController extends Controller
{
    public function store() {
        $fox = Fox::create(
            [
                'content'=> request()->get("fox",""),
            ]
        );

        return redirect()->route("dashboard");
    }
}
