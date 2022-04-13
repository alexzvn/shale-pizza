<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (! auth()->attempt($request->only('email', 'password'))) {
            $this->refuse();
        }

        return redirect(RouteServiceProvider::HOME);
    }

    protected function refuse()
    {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
}
