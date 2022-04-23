<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index', [
            'admins' => AdminRepo::getAll()
        ]);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.edit', [
            'admin' => AdminRepo::getById($id)
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        AdminRepo::insert(
            $request->name,
            $request->email,
            Hash::make($request->password)
        );

        return to_route('manager.admin');
    }

    public function update(Request $request, int $id)
    {
        $admin = AdminRepo::getById($id);

        $verifyPassword = function($attribute, $value, $fail) use ($request, $admin) {
            if (empty($request->password)) return;

            if (Hash::check($value, $admin->password)) {
                return;
            }

            $fail('The password is incorrect.');
        };

        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:admins,email,' . $id,
        ]);

        if ($request->old_password) {
            $this->validate($request, [
                'old_password' => $verifyPassword,
                'password' => 'nullable|string|min:6|confirmed',
            ]);

            $admin->password = Hash::make($request->password);
        }

        AdminRepo::update($id, $request->name, $request->email, $admin->password);

        return back()->with('success', 'Admin updated successfully.');
    }

    public function delete(int $id)
    {
        AdminRepo::delete($id);

        return to_route('manager.admin');
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password' => ['required', ...$this->passwordRules()],
        ];
    }

    protected function passwordRules()
    {
        return [
            'confirmed',
            Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->uncompromised()
        ];
    }
}
