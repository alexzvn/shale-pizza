@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('manager.customer.update', $customer->id) }}" method="post">
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
                @include('components.input', [
                    'label' => 'Country',
                    'name' => 'country',
                    'placeholder' => 'New country',
                    'value' => $customer->country
                ])

                <div class="form-group">
                    <label for="gender">Gender</label>  
                    <select name="gender" id ="Gender" class="card" style="padding: 0.375rem 0.75rem;" required>
                        <option value="">Gender</option>
                        <option value="0">Female</option>
                        <option value="1">Male</option>
                        <option value="2">NonBinary</option>
                        <option value="3">Transgender</option>
                        <option value="4">Intersex</option>
                        <option value="5">RatherNotSay</option>
                        <option value="6">Other</option>
                    </select>
                    @error('gender')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                
                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
