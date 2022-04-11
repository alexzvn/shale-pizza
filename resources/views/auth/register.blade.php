@extends('template.auth')

@section('auth')
<form style="min-width: 400px;">
<h3 class="text-center">Customer Register</h3>

@include('components.input', [
    'name' => 'name',
    'label' => 'Name',
    'placeholder' => 'Your name'
])

@include('components.input', [
    'name' => 'email',
    'label' => 'Email',
    'placeholder' => 'email@example.com',
    'type' => 'email'
])

@include('components.input', [
    'name' => 'phone',
    'label' => 'Phone',
    'placeholder' => 'Your phone number'
])

@include('components.input', [
    'name' => 'address',
    'label' => 'Address',
    'placeholder' => 'Your address'
])


@include('components.input', [
    'name' => 'country',
    'label' => 'Country',
    'placeholder' => 'Your country'
])

<div class="text-center mt-3">
    <button type="button" class="btn btn-primary">Register</button>
</div>

</form>
@endsection