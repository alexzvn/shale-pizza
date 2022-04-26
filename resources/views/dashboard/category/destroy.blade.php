@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('manager.category.delete', $category->id) }}" method="post"> 
                @csrf
                <h1 class="text-center">Delete Category {{ $category->name }}</h1>


                @if($shouldDelete == false)
                <div class="alert alert-warning" role="alert">
                    <strong>You must delete all food related to this category</strong>
                </div>
                @endif

                @include('components.input', [
                    'label' => 'Name',
                    'name' => 'name',
                    'placeholder' => 'Name of new category',
                    'value' => $category->name,
                    'attributes' => ['readonly']
                ])

                @if ($shouldDelete)
                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                @endif
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
