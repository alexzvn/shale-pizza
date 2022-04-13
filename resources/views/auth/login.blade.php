@extends('template.auth')

@section('auth')
<form method="POST" action="{{ route('login') }}" style="min-width: 400px;">
<h3 class="text-center">Admin Login</h3>
@csrf

@include('components.input', [
    'name' => 'email',
    'label' => 'Email',
    'placeholder' => 'email@example.com',
    'type' => 'email'
])

@include('components.input', [
    'name' => 'password',
    'label' => 'Password',
    'type' => 'password'
])

<div class="text-center mt-3">
    <button type="submit" class="btn btn-primary">Log In</button>
</div>
</form>
@endsection
