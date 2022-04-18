@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('manager.customer.update', $customer) }}" method="post">
                <h1 class="text-center">Modify Customer {{ $customer->name }}</h1>

                @csrf

                @include('components.input', [
                    'label' => 'Name',
                    'name' => 'name',
                    'placeholder' => 'Name of new category',
                    'value' => $customer->name
                ])

                @include('components.input', [
                    'label' => 'Email',
                    'name' => 'email',
                    'type' => 'email',
                    'placeholder' => 'New Email',
                    'value' => $customer->email
                ])

                @include('components.input', [
                    'label' => 'Phone',
                    'name' => 'phone',
                    'placeholder' => 'New Phone Number',
                    'value' => $customer->phone
                ])

                @include('components.input', [
                    'label' => 'Address',
                    'name' => 'address',
                    'placeholder' => 'New Address',
                    'value' => $customer->address
                ])

                <label for="Gender">Gender:</label>
                <select name="gender" id ="Gender">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                    <option value="6">Other</option>
                </select>

                {{-- @include('components.input', [
                    'label' => 'Gender',
                    'name' => 'gender',
                    'placeholder' => 'New Gender',
                    'value' => $customer->gender
                ]) --}}

                @include('components.input', [
                    'label' => 'Country',
                    'name' => 'country',
                    'placeholder' => 'New country',
                    'value' => $customer->country
                ])

                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
