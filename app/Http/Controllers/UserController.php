<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $foxx = $user->foxx()->paginate(5);
        return view('users.show', compact('user', 'foxx'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $foxx = $user->foxx()->paginate(5);
        return view('users.edit', compact('user', 'editing', 'foxx'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image',
        ]);

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }
        $validated['user_id'] = auth()->id();

        DB::update('update users set name = :name, bio = :bio, image = :image where id = :id', [
            'name' => $validated['name'],
            'bio' => $validated['bio'],
            'image' => $validated['image'],
            'id' => $validated['user_id'],
        ]);

        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
