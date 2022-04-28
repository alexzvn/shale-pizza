@extends('template.public')

@push('styles')
<style>
.bg-pizza-cover {
    background-image: url('{{ asset("assets/pizza-bg.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
@endpush

@section('content')
<div class="min-vh-100 bg-pizza-cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 my-5 py-5">
                <div class="card">
                    <div class="card-body text-center py-3">
                        <h4 class="card-title display-5">Download ours Menu</h4>
                       
                        <a class="btn btn-primary btn-lg mt-3" href="{{ asset('delivery-menu.pdf') }}" download="delivery-menu.pdf">Download Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
