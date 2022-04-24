<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepos;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('dashboard.customer.index', [
            'customers' => CustomerRepos::getAll()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        CustomerRepos::insert(
            $request->name,
            $request->email,
            $request->phone,
            $request->address,
            $request->country,
            $request->gender
        );

        return to_route('auth.ask');
    }

    public function edit(int $id)
    {
        return view('dashboard.customer.edit', [
            'customer' => CustomerRepos::getById($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|size:10',
            'address'=>'required',
            'country'=>'required',
            'gender' => 'required'
        ]);

        CustomerRepos::update($id, $request->name, $request->email, $request->phone, $request->address, $request->country, $request->gender);

        return to_route('manager.customer');
    }

    public function delete(int $id)
    {
        CustomerRepos::delete($id);

        return to_route('manager.customer');
    }

    public function rules()
    {
        return [
            'name'=>'required', 
            'email'=>'required|email:rfc,dns',
            'phone'=>'required|size:10',
            'address'=>'required',
            'country'=>'required',
            'gender' => 'required'
        ];
    }

}


