<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index', [
            'admins' => Admin::paginate()
        ]);
    }

    public function edit(Admin $admin)
    {
        return view('dashboard.admin.edit', [
            'admin' => $admin
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request, Admin $admin)
    {
        $admin->fill(
            $this->validate($request, $this->rules())
        );

        $admin->password = Hash::make($admin->password);

        $admin->save();

        return to_route('manager.admin');
    }

    public function update(Request $request, Admin $admin)
    {
        $attributes = $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $admin->fill($attributes);

        if ($request->has('password')) {
            $admin->password = Hash::make($attributes['password']);
        }

        $admin->save();

        return to_route('manager.admin');
    }

    public function delete(Admin $admin)
    {
        $admin->delete();

        return to_route('manager.admin');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
