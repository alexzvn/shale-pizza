@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('manager.foods.update', $food) }}" methods = "post">
                    <h1 class="text-content">Update food {{ $food->name }}</h1>
                    
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
                        'placeholder' => 'Price of new food',
                        'value' => $food->price
                    ])

                    @include('components.input',[
                        'label' => 'Image',
                        'name' => 'image',
                        'placeholder' => 'Image of new food',
                        'value' => $food->image
                    ])

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
                        <label for="category" class="font-weight-bold">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Category</option>
                            {{-- search mạng :v --}}
                            @php($categories=\App\Models\Category::all())
                            {{--  --}}
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cId != null && $cId == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
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