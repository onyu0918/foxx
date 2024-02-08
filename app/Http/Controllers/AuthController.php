<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        return view("auth.register");
    }
    //
    public function store(Request $request) {
        $validated = $request->validate(
            [
                "name" => 'required',
                "email",
                "password",
            ]
        );
    }
}
