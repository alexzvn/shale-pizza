<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\AdminRepo;
use Illuminate\Support\Facades\Session;

class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Session::get('auth:admin');
        $admin = AdminRepo::getById($id);

        if (! $admin) {
            session()->forget('auth:admin');
            return redirect(route('login'));
        }

        Session::flash('admin', $admin);

        return $next($request);
    }
}
