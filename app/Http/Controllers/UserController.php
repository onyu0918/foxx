<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $foxx = $user->foxx()->paginate(5);
        return view("users.show", compact("user","foxx"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $foxx = $user->foxx()->paginate(5);
        return view("users.show", compact("user","editing","foxx"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        return view("users.show", compact("user"));
    }
}
