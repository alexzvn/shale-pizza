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

            <table class="table table-striped table-inverse">
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
                        <td><img src="/{{ $food->image }}" alt="" width="150px" height="150px" style="object-fit: cover"></td>
                        <td>{{ $food->description }}</td>
                        <td>{{ $food->categoryName }}</td>
                        <td>
                            <ul class="table-controls">
                                <li>
                                  <a class="btn btn-primary" href="{{ route('manager.foods.edit', $food->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </li>
                
                                <li>
                                  <a href=""></a>
                                  <form action="{{ route('manager.foods.delete', $food->id) }}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                  </form>
                                </li>
                              </ul>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
