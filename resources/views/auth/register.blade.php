@extends('template.auth')

@section('auth')
<form action="{{ route('register.store') }}" style="min-width: 400px;" method="POST">
    <h3 class="text-center">Customer Register</h3>

    @csrf

    @include('components.input', [
        'label' => 'Name',
        'name' => 'name',
        'placeholder' => 'Name of new category',
    ])

    @include('components.input', [
        'label' => 'Email',
        'name' => 'email',
        'type' => 'email',
        'placeholder' => 'New Email',
    ])

    @include('components.input', [
        'label' => 'Phone',
        'name' => 'phone',
        'placeholder' => 'New Phone Number',
    ])

    @include('components.input', [
        'label' => 'Address',
        'name' => 'address',
        'placeholder' => 'New Address',
    ])
    
    @include('components.input', [
        'label' => 'Country',
        'name' => 'country',
        'placeholder' => 'New country'
    ])
    
    <div class="form-group">
        <label for="gender">Gender</label>  
        <select name="gender" id ="Gender" class="card" style="padding: 0.375rem 0.75rem;">
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

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>

</form>
@endsection