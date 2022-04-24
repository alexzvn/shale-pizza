@extends('template.public')
@section('content')
<style>
img {
    width: 100%;
    max-width: 100%;
    height: auto;
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

<div class="container">
    <div class="row">

        <div class ="col-md-5" style ="margin: 10px">
            <img src = "{{ asset($food->image) }}" 
            alt="product-image" class="rounded">
        </div>

        <div class="col-md-6" style ="margin: 10px">
            <div class="product-title mt-0">
                <h5>{{ $food->name }}</h5>
            <p class="md-0">{{ $food->description }}</p>
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
            </div>

            <button type="button" class="btn btn-success" href ="#">Add To Cart</button>
        </div>
    </div>
</div>

<div class ="container">
    <div class ="row">
        <div class="col-md-12">
            <div class="related-product">
                <h2>Related Product</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class ="row">
                <div class="card-deck" style="width:300px">
                    <img class="card-img-top" src="https://static.phdvasia.com/sg1/menu/single/desktop_thumbnail_dea40ea9-8375-45d0-8fd9-519ed9836331.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">Hawaiian Chicken</h4>
                      <p class="card-text">with tomato sauce, chicken meat, pineapples, mozzarella cheese.</p>
                      <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>    
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="card-deck" style="width:300px">
                    <img class="card-img-top" src="https://static.phdvasia.com/sg1/menu/single/desktop_thumbnail_dea40ea9-8375-45d0-8fd9-519ed9836331.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Kari Raya Pizza</h4>
                            <p class="card-text">Limited time pizza with 12 pockets full of curry and potato, topped with chicken pop, mozzarella cheese and more curry goodness.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                         </div> 
                </div>
            </div>
           
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="card-deck" style="width:300px">
                    <img class="card-img-top" src="https://static.phdvasia.com/sg1/menu/single/desktop_thumbnail_f4346a0c-9b92-42e2-a13e-3bbd3917b9d7.png" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Creamy Chicken Fiesta</h4>
                            <p class="card-text">New creamy white sauce with chicken salami and chicken pepperoni, only available on the new light & airy Hand Crafted Pizza</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div> 
                </div>
            </div> 
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="card-deck" style="width:300px">
                    <img class="card-img-top" src="https://static.phdvasia.com/sg1/menu/single/desktop_thumbnail_3e6358e6-44fa-4e66-9f10-a6d784b8b494.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Triple Chicken</h4>
                            <p class="card-text">with thousand island sauce, chicken rolls, chicken meat, chicken salami, mushrooms, tomatoes, onions, mozzarella cheese.</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div> 
                </div>
            </div> 
        </div>
    </div>  
</div>
    
@endsection