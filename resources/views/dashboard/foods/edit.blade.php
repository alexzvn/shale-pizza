@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('manager.foods.update', $food->id) }}" method="post" enctype="multipart/form-data">
                    <h1 class="text-content">Modify food {{ $food->name }}</h1>
                    
                    @csrf

                    @include('components.input',[
                        'label' => 'Food',
                        'name' => 'name',
                        'placeholder' => 'Name of new food',
                        'value' => $food->name
                    ])

                    @include('components.input',[
                        'label' => 'Price',
                        'name' => 'price',
                        'type' => 'number',
                        'placeholder' => 'Price of new food',
                        'value' => $food->price
                    ])

                    @include('components.input',[
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'file',
                        'placeholder' => 'Image of new food',
                        'value' => $food->image,
                    ])
                    <img src="{{ asset($food->image) }}" alt="" width="200px" height="200px">
                    @include('components.input',[
                        'label' => 'Description',
                        'name' => 'description',
                        'placeholder' => 'Description of new food',
                        'value' => $food->description
                    ])

                    @php
                        $cId = old('category') ?? $food->category_id ?? null;
                    @endphp
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Category</option>
                            @php($categories=App\Repositories\CategoryRepos::getAll())
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cId != null && $cId == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-success">Update Food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection