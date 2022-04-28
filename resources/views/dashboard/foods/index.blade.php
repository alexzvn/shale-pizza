@extends('template.dashboard')

@push('styles')
<style>
.img {
    width: 150px;
    height: 150px;
    object-fit: cover;
}
</style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
               <div class="col-md-8">
                    <h1>
                        Manage Foods
                        <a class="btn rounded-circle btn-success" href="{{ route('manager.foods.create') }}" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </a>
                    </h1>
               </div>
                {{-- <div class="form-group col-md-4">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div> --}}
            </div>

            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td class="bs-tooltip" data-toggle="tooltip" data-html="true" data-placement="left" title="<img class='img' src='{{ asset($food->image) }}'>">
                            {{ $food->name }}
                        </td>
                        <td>{{ $food->price }}$</td>
                        <td  class="bs-tooltip" data-toggle="tooltip" title="{{ $food->description }}">
                            {{ Str::limit($food->description, 40) }}
                        </td>
                        <td>{{ $food->categoryName }}</td>
                        <td>
                            <ul class="table-controls" style="display: table-caption">
                                <li>
                                    <a class="btn btn-primary" href="{{ route('manager.foods.edit', $food->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                    </a>
                                </li>
                
                                <li>
                            
                                    <a class="btn btn-danger" href="{{ route('manager.foods.confirm', $food->id) }}" style="margin-top: 10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                  {{-- <form action="{{ route('manager.foods.confirm', $food->id) }}" method="get" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                    
                                  </form> --}}
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