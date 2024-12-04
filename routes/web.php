<?php

use App\Http\Controllers\AuthApplicantController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
});

//Applicant Auth
ROute::get('/register-applicant', [AuthApplicantController::class, 'create'])->name('register-applicant');
