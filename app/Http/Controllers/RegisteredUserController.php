<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        // dd(request()->all());
        // validate
        $validated = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'], // email_confirmation
            'password' => ['required', Password::min(6), 'confirmed'], // password_confirmation
        ]);

        // create the user
        $user = User::create($validated);
        // log in
        Auth::login($user);
        // redirect somewhere
        return redirect('/jobs');
    }
}
