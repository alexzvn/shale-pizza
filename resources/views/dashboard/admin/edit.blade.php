@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('manager.admin.update', $admin) }}" method="post">
                <h1 class="text-center">Modify admin {{ $admin->name }}</h1>

                @csrf

                @include('components.input', [
                    'label' => 'Name',
                    'name' => 'name',
                    'placeholder' => 'Name of new admin',
                    'value' => $admin->name
                ])

                @include('components.input', [
                    'label' => 'Email',
                    'name' => 'email',
                    'placeholder' => 'Email of new admin',
                    'value' => $admin->email
                ])

                @include('components.input', [
                    'label' => 'Password',
                    'name' => 'password',
                    'type'=> 'password',
                    'placeholder' => 'Password',
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
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
