<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index() {

        // if(!Gate::allow("admin")) {
        //     abort(403);
        // }
        return view("admin.dashboard");
    }
}
