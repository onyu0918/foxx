<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FoxController extends Controller
{
    public function show(Fox $fox) {

        $editing = false;

        return view("foxx.show", compact("fox", "editing"));
    }

    public function edit(Fox $fox) {

        $editing = true;

        return view("foxx.show", compact("fox", "editing"));
    }


    public function store() {
        $validated = request()->validate([
            "content"=> "required|min:5|max:240",
        ]);
        $validated['user_id'] = auth()->id();
        DB::insert('insert into foxx(user_id,content) values(:user_id, :content)', [
            'user_id' => $validated['user_id'],
            'content' => $validated['content'],
        ]);

        return redirect()->route("dashboard")->with("success","Fox create successfully!");
    }

    public function update(Fox $fox) {

        $validated = request()->validate([ "content"=> "required|min:5|max:240", ]);
        $fox->update($validated);

        return redirect()->route("fox.show",$fox->id)->with("success","Fox updated successfully!");
    }

    public function destroy(Fox $fox) {

        Fox::destroy($fox->id);

        return redirect()->route("dashboard")->with("success","Fox Deleted successfully!");
    }
}
