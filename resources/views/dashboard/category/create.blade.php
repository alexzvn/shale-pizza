@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('manager.category.store') }}" method="post">
                <h1 class="text-center">Create Category</h1>

                @csrf

                @include('components.input', [
                    'label' => 'Name',
                    'name' => 'name',
                    'placeholder' => 'Name of new category',
                ])
                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-success">Create Category</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
