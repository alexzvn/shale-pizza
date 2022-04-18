<?php

namespace App\Http\Controllers\Dashboard;

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
            'customer' => $customer
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
            'email'=>'required','unique: email_address',
            'phone'=>'required','unique: phone_number, 10',
            'address'=>'required',
            'gender' => 'required_with: 0,1,6',
        ];
    }

}


