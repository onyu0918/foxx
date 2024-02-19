<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFoxRequest;
use App\Http\Requests\UpdateFoxRequest;
use App\Models\Fox;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FoxController extends Controller
{
    public function show(Fox $fox)
    {
        $editing = false;
        return view('foxx.show', compact('fox'));
    }

    public function edit(Fox $fox)
    {
        // if(auth()->id() !== $fox->user_id) {
        //     abort(404);
        // }
        $this->authorize('update', $fox);
        $editing = true;

        return view('foxx.show', compact('fox', 'editing'));
    }

    public function store(CreateFoxRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        // DB::insert('insert into foxx(user_id,content) values(:user_id, :content)', [
        //     'user_id' => $validated['user_id'],
        //     'content' => $validated['content'],
        // ]);
        $fox = new Fox();
        $fox->user_id = auth()->id();
        $fox->content = $validated['content'];
        $fox->save();

        return redirect()->route('dashboard')->with('success', 'Fox create successfully!');
    }

    public function update(UpdateFoxRequest $request,Fox $fox)
    {
        // if (auth()->id() !== $fox->user_id) {
        //     abort(404);
        // }
        $this->authorize('update', $fox);

        $validated = $request->validated;
        $fox->update($validated);

        return redirect()
            ->route('fox.show', $fox->id)
            ->with('success', 'Fox updated successfully!');
    }

    public function destroy(Fox $fox)
    {
        // if(auth()->id() !== $fox->user_id) {
        //     abort(404);
        // }
        $this->authorize('delete', $fox);

        Fox::destroy($fox->id);

        return redirect()->route('dashboard')->with('success', 'Fox Deleted successfully!');
    }
}
