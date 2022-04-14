@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('manager.foods.store') }}" methods = "post">
                    <h1 class="text-content">Create new food</h1>
                    
                    @csrf

                    @include('components.input',[
                        'label' => 'Food',
                        'name' => 'name',
                        'placeholder' => 'Name of new food',
                    ])

                    @include('components.input',[
                        'label' => 'Price',
                        'name' => 'price',
                        'placeholder' => 'Price of new food'
                    ])

                    @include('components.input',[
                        'label' => 'Image',
                        'name' => 'image',
                        'placeholder' => 'Image of new food'
                    ])

                    @include('components.input',[
                        'label' => 'Description',
                        'name' => 'description',
                        'placeholder' => 'Description of new food'
                    ])
                    
                    <div class="form-group">
                        <label for="category" class="font-weight-bold">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="0">Category</option>
                            @foreach ($categorys as $cat)
                                <option value="{{ $cat->id }}" {{ $cId != null && $cId == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-success">Create Food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection