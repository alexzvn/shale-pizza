<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('dashboard.customer.index', [
            'customers' => Customer::paginate()
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('dashboard.customer.edit', [
            'customer' => $customer,
            'genders' => Gender::cases(),
        ]);
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        return to_route('manager.customer');
    }

    public function update(Request $request, Customer $customer)
    {
        $attributes = $this->validate($request, $this->rules());
        $customer->fill($attributes);
        $customer->save();

        return to_route('manager.customer');
    }

    public function rules()
    {
        return [
            'name'=>'required', 
            'email'=>'required|email:rfc,dns',
            'phone'=>'required|size:10',
            'address'=>'required',
            'gender' => '',
        ];
    }

}


