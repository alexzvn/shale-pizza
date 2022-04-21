<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repositories\AdminRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login()
    {
        if (session()->has('auth:admin')) {
            return redirect(RouteServiceProvider::HOME);
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $admin = $this->attempt($request->email, $request->password);

        !$admin && $this->refuse();

        session(['auth:admin' => $admin->id]);

        return redirect(RouteServiceProvider::HOME);
    }

    protected function refuse()
    {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    protected function attempt($email = '', $password = '')
    {
        $admin = AdminRepo::getByField('email', $email);

        if (!$admin || !Hash::check($password, $admin->password)) {
            return false;
        }

        return $admin;
    }
}
