<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\JobPoster;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobPosterRegisterController extends Controller
{
    public function create() {
        return Inertia::render('Auth/JobPoster/Create');
    }

    public function store(Request $request) {
        $attrs = $request->validate([
            'companyName' => ['required', 'string'],
            'pib' => ['required', 'string'],
            'registrationNumber' => ['required', 'string'],
            'industry' => ['required', 'numeric'],
            'registration' => ['required', 'string'],
            'phoneNumber' => ['required', 'string'],
            'country' => ['required', 'string'],
            'city' => ['required', 'numeric'],
            'postalCode' => ['required', 'string'],
            'companyAddress' => ['required', 'string'],
            'ownerName' => ['required', 'string'],
            'ownerLastName' => ['required', 'string'],
            'companySize' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $jobPoster = JobPoster::create([
            'company_name' => $attrs['companyName'],
            'pib' => $attrs['pib'],
            'registration_number' => $attrs['registrationNumber'],
            'industry' => $attrs['industry'],
            'registration' => $attrs['registration'],
            'phone_number' => $attrs['phoneNumber'],
            'country' => $attrs['country'],
            'city' => $attrs['city'],
            'postal_code' => $attrs['postalCode'],
            'company_address' => $attrs['companyAddress'],
            'owner_name' => $attrs['ownerName'],
            'owner_last_name' => $attrs['ownerLastName'],
            'company_size' => $attrs['companySize'],
        ]);
        $user = User::create([
            'email' => $attrs['email'],
            'password' => $attrs['password'],
            'profilable_id' => $jobPoster->id,
            'pofilable_type' => JobPoster::class,
        ]);

        auth()->login($user);

        $request->session()->regenerate();

        return redirect()->intended('/');
    }
}
