<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobPosterRegisterController extends Controller
{
    public function create() {
        return Inertia::render('Auth/JobPoster/Create');
    }

    public function store(Request $request) {
        dd('hello');
    }
}
