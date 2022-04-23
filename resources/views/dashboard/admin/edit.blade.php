@extends('template.dashboard')

@php
$shouldEdit = session('admin')->id == $admin->id;
@endphp

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('manager.admin.update', $admin->id) }}" method="post">
                <h1 class="text-center">Modify admin {{ $admin->name }}</h1>

                @csrf

                @include('components.input', [
                    'label' => 'Name',
                    'name' => 'name',
                    'placeholder' => 'Name of new admin',
                    'value' => $admin->name,
                    'attributes' => $shouldEdit ? [] : ['disabled'] 
                ])

                @include('components.input', [
                    'label' => 'Email',
                    'name' => 'email',
                    'placeholder' => 'Email of new admin',
                    'value' => $admin->email,
                    'attributes' => $shouldEdit ? [] : ['disabled'] 
                ])

                @if ($shouldEdit)
                @include('components.input', [
                    'label' => 'Old Password',
                    'name' => 'password',
                    'type'=> 'password',
                    'placeholder' => 'Your password',
                ])


                @include('components.input', [
                    'label' => 'Password',
                    'name' => 'password',
                    'type'=> 'password',
                    'placeholder' => 'New password Password',
                ])

                @include('components.input', [
                    'label' => 'Password Confirmation',
                    'name' => 'password_confirmation',
                    'type'=> 'password',
                    'placeholder' => 'Password confirmation',
                ])

                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                @endif
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
