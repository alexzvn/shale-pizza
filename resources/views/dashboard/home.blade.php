@extends('template.dashboard')

@push('styles')
<script src="//unpkg.com/alpinejs" defer></script>
<style>
.cursor-pointer {
    cursor: pointer;
}
</style>

<script>
function redirect() {
    window.location.href = this.link
}
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-3" x-data=@json(['link' => route('manager.category')])>
        <div class="card text-center cursor-pointer" @click="redirect">
            <div class="card-body">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                </h4>
                <p class="card-text">
                    <a :href="link">Manage Categories</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-3" x-data=@json(['link' => route('manager.foods')])>
        <div class="card text-center cursor-pointer" @click="redirect">
            <div class="card-body">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                </h4>
                <p class="card-text">
                    <a :href="link">Manage Foods</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-3" x-data=@json(['link' => route('manager.customer')])>
        <div class="card text-center cursor-pointer" @click="redirect">
            <div class="card-body">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </h4>
                <p class="card-text">
                    <a :href="link">Manage Customers</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-3" x-data=@json(['link' => route('manager.admin')])>
        <div class="card text-center cursor-pointer" @click="redirect">
            <div class="card-body">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </h4>
                <p class="card-text">
                    <a :href="link">Manage Admins</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
