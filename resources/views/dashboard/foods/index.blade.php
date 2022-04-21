@extends('template.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
               <div class="col-md-8">
                    <h1>
                        Manage Foods
                        <a class="btn btn-success" href="{{ route('manager.foods.create') }}" role="button">Add new food</a>
                    </h1>
               </div>
                <div class="form-group col-md-4">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            
            
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->price }}</td>
                        <td><img src="{{ asset($food->image) }}" alt="" width="150px" height="150px"></td>
                        <td>{{ $food->description }}</td>
                        <td>{{ $food->categoryName }}</td>
                        <td>
                            <a href="{{ route('manager.foods.edit', $food->id) }}" class="btn btn-secondary" role="button" onsubmit="deleteFood">Edit</a>
                            <form action="{{ route('manager.foods.delete', $food->id) }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection