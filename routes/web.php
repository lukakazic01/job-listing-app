<?php

use App\Http\Controllers\Auth\ApplicantRegisterController;
use App\Http\Controllers\Auth\JobPosterRegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanySizeController;
use App\Http\Controllers\IndustryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
});

//Applicant Auth
Route::get('/register-applicant', [ApplicantRegisterController::class, 'create'])->name('register-applicant');
Route::post('/register-applicant', [ApplicantRegisterController::class, 'store']);

//JobPoster Auth
Route::get('/register-job-poster', [JobPosterRegisterController::class, 'create'])->name('register-job-poster');
Route::post('/register-job-poster', [JobPosterRegisterController::class, 'store']);

//Select inputs
Route::get('/industries', IndustryController::class);
Route::get('/cities', CityController::class);
Route::get('/company-sizes', CompanySizeController::class);
