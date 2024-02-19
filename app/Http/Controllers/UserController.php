<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
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
        $this->authorize('update', $user);
        $editing = true;
        $foxx = $user->foxx()->paginate(5);
        return view('users.edit', compact('user', 'editing', 'foxx'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        $this->authorize('update', $user);
        $validated = $request->validated();

        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
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
