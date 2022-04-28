@extends('template.public')

@push('styles')
<style>
#img>img {
    width: 650px;
    max-width: 100%;
    height: 500px;
    -webkit-backface-visibility: hidden;
}

body{
    background:#f5f5f5;
}

.rounded {
    border-radius: 5px !important;
}

.product-title {
margin: 15px 0;
background-color: #fff;
padding: 30px 40px;
border-radius: 5px;
}

.product-infor {
margin: 15px 0;
background-color: #fff;
padding: 30px 40px;
border-radius: 5px;
}

.product-infor p{
margin-bottom: 15px;
padding-bottom: 15px;
border-bottom: 1px solid #d5dadb;
}

.quantity {
    width: 120px;
}

.related-product h2{
    margin: 30px;
    text-align: center;
}

.card-deck {
    margin: 15px 0;
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 5px;
}
</style>
@endpush

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class ="col-md-5" style ="margin: 10px" id="img">
            <img src = "{{ asset($food->image) }}" 
            alt="product-image" class="rounded">
        </div>

        <div class="col-md-6" style ="margin: 10px">
            <div class="product-title mt-0">
                <h2>{{ $food->name }}</h2>
                <p class="md-0 font-weight-lighter">{{ $food->description }}</p>
            </div>

            <div class="product-infor">
                <p><b>Category:</b> 
                    {{ $food->categoryName  }}
                </p>
                <p><b>Price:</b> {{ $food->price }}$</p>
                <div class="form-group">
                    <label><b>Quantity:</b><input type="number" 
                    placeholder="1" class="form-control quantity"></label>  
                </div>

                <button type="button" class="btn btn-success mt-4" href ="#">Call To Order</button>
            </div>

        </div>
    </div>
</div>

<div class ="container mb-5">
    <div class ="row">
        <div class="col-md-12">
            <div class="related-product">
                <h2>Related Product</h2>
            </div>
        </div>

        @foreach ($relatives as $item)
        <div class="col-md-3">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width: 100%; height: 210px; object-fit: cover;">
                <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between;">
                    <h4 class="card-title">{{ $item->name }}</h4>
                    <p class="card-text">{{ $item->description }}</p>
                    <a href="{{ route('detail.home', $item->id) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
