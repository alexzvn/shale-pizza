@extends('template.public')

@push('styles')
<style>
.auth {
    display: grid;
    place-items: center;
    min-height: 80vh;
}

</style>
@endpush

@section('content')
<div class="container">
    <div class="auth">
        <div class="card shadow">
            <div class="card-body">
                @yield('auth')
            </div>
        </div>
    </div>
</div>
@endsection
