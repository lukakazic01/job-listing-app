<?php

use App\Http\Controllers\AuthApplicantController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
});

//Applicant Auth
Route::get('/register-applicant', [AuthApplicantController::class, 'create'])->name('register-applicant');
Route::post('/register-applicant', [AuthApplicantController::class, 'store'])->name('register-applicant');
