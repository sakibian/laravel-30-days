<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {
        // dd(request()->all());

        // Validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt to login the user
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        };
        // regenerate the session token
        request()->session()->regenerate();
        // redirect the user
        return redirect('/jobs');
    }

    public function destroy() {
        Auth::logout();
        return redirect('/');
    }

}
