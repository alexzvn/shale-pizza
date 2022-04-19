@extends('template.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>
                Manage Foods
                <a class="btn btn-success" href="{{ route('manager.foods.create') }}" role="button">Add new food</a>
            </h1>

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
                        <td><img src="{{ $food->image }}" width="200px" height="200px"></td>
                        <td>{{ $food->description }}</td>
                        <td>{{ $food->category->name }}</td>
                        <td>
                            <a href="{{ route('manager.foods.edit', $food) }}" class="btn btn-secondary" role="button" onsubmit="deleteFood">Edit</a>
                            <form action="{{ route('manager.foods.delete', $food) }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>

            {{ $foods->links() }}

        </div>
    </div>
@endsection

@push('scripts')
@endpush