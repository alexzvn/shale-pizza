@extends('template.auth')

@section('auth')
<form style="min-width: 400px;">
    <h3 class="text-center">Admin Login</h3>

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
    'name' => 'password',
    'label' => 'Password',
])

<div class="text-center mt-3">
    <button type="button" class="btn btn-primary">Log In</button>
</div>

@endsection