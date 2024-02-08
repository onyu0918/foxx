<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fox;
use Illuminate\Http\Request;

class FoxController extends Controller
{
    public function show(Fox $fox) {
        return view("foxx.show", [
            "fox"=> $fox
        ]);
    }


    public function store() {
        request()->validate([
            "fox"=> "required|min:5|max:240",
        ]);
        $fox = Fox::create(
            [
                'content'=> request()->get("fox",""),
            ]
        );

        return redirect()->route("dashboard")->with("success","Fox create successfully!");
    }

    public function destroy(Fox $fox) {
        Fox::destroy($fox->id);
        return redirect()->route("dashboard")->with("success","Fox Deleted successfully!");
    }
}
