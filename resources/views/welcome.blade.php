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
            <img style="height: 550px;" class="d-block w-100" src="https://png.pngtree.com/thumb_back/fw800/back_our/20190620/ourmid/pngtree-gourmet-food-pizza-background-template-image_160185.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 style="color: white!important">Welcome to Shale Pizza</h1>
                <h3>All you need is Pizza</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img style="height: 550px;" class="d-block w-100" src="https://png.pngtree.com/thumb_back/fw800/back_our/20190622/ourmid/pngtree-seafood-vegetable-pizza-gourmet-background-poster-image_214182.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img style="height: 550px;" class="d-block w-100" src="https://file.vfo.vn/hinh/2016/01/anh-bia-ve-do-an-telasm-37.jpg" alt="Third slide">
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
    <form class="d-flex search" action="{{ route('search')}}" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-success my-2 my-sm-0" type="submit" style="margin-left: 5px">Search</button>
    </form>
</div>
<br>

<div class="container d-flex justify-content-center menu">
    <h1 style="background-color: #f5f5f5;; padding: 0 5rem" id="menu">Menu</h1>
</div>
<br>
    
<div class="container d-flex justify-content-around" id="category">    
    @php($categories=App\Repositories\CategoryRepos::getAll())
    @foreach ($categories as $cat)
        <li>
            <a href="{{ route('filter.home',['id'=>$cat->id]) }}#menu">
                <h2>{{ $cat->name }}</h2>
            </a>
        </li>
    @endforeach
</div>

<div class="container mt-5">
    <div class="row">
        @foreach ($foods as $food)
            <div class="col-md-3">
                <div class="card shadow-md" style="margin-bottom: 30px;">
                    <a href="{{ route('detail.home', ['id' => $food->id]) }}"><img class="card-img-top" src="{{ asset($food->image) }}" alt="Card image cap"></a>
                    <div class="card-body">
                        <a href="{{ route('detail.home', $food->id) }}" class="card-title">{{ $food->name }}</a>
                        <p class="card-text">{{ $food->price }}$</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>  

<div class="container my-5">
    <a href="#menu" role="button" class="d-flex justify-content-end">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
            <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"/>
        </svg>
    </a>
</div>
@endsection

@push('scripts')
    
@endpush
