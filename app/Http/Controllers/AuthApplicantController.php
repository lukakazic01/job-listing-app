<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

class AuthApplicantController extends Controller
{
    public function create() {
        return Inertia::render('Auth/Applicant/Create');
    }
}
