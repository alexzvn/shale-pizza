@extends('template.public')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://png.pngtree.com/thumb_back/fw800/back_our/20190620/ourmid/pngtree-gourmet-food-pizza-background-template-image_160185.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome to Shale Pizza</h1>
                    <h3>All you need is Pizza</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://png.pngtree.com/thumb_back/fw800/back_our/20190622/ourmid/pngtree-seafood-vegetable-pizza-gourmet-background-poster-image_214182.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://file.vfo.vn/hinh/2016/01/anh-bia-ve-do-an-telasm-37.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br><br>
    
    <div class="container d-flex justify-content-center">
        <form class="d-flex search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <br>

    <div class="container d-flex justify-content-center menu">
        <a href=""><h1 style="background-color: #f5f5f5;">Menu</h1></a>
    </div>
    <br>
    
    <div class="container d-flex justify-content-around" id="category">
        
        <li>
            <a href=""><h2>Pizza</h2></a>
        </li>
        
        <li>
            <a href="" ><h2>Spagetti</h2></a>
        </li>
        
        <li>
            <a href="" ><h2>Salad</h2></a>
        </li>
        
        <li>
            <a href="" ><h2>Drink</h2></a>
        </li>
        
        <li>
            <a href=""><h2 style="">Combo</h2></a>
        </li>
        
        <li>
            <a href=""><h2 style="">Other</h2></a>
        </li>
        {{-- <li style="border-right: 1px solid #8c8c8c;"></li> --}}
    </div>

    <br><br>

    <div class="container">
        <div class="d-flex justify-content-around row card-deck">
            @foreach ($foods as $food)
                <div class="card" id="food">
                    <a href="{{ route('detail', ['id' => $food->id]) }}"><img class="card-img-top" src="{{ asset($food->image) }}" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text">{{ $food->price }}$</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>    
@endsection

@push('scripts')
<script>$('.carousel').carousel()</script>
    
@endpush