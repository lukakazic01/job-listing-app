<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicantRegisterController extends Controller
{
    public function create() {
        return Inertia::render('Auth/Applicant/Create');
    }

    public function store(Request $request) {
        $attrs = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|alpha_num',

        ]);
        $applicant = Applicant::create([]);
        $user = User::create([
            'email' => $attrs['email'],
            'password' => $attrs['password'],
            'profilable_id' => $applicant->id,
            'profilable_type' => Applicant::class
        ]);

        auth()->login($user);
        $request->session()->regenerate();
        return redirect()->intended('/');

    }
}
