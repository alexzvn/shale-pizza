@extends('template.dashboard')

@section('content')
<div class ="card">
    <h1>
        Category
        <a class="btn btn success" href="{{route('manager.category.create') }}" role="button">New Category</a>}
    </h1> 

    <table class ="table table-striped table-inverse table-responsive">
        <thead class ="thead-inverse">
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
        </thead>
        @foreach ($category as $category)
        <tbody>
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a class="btn btn-secondary" href="{{ route('manager.category.edit', $category) }}" role="button" onsubmit="deleteCatergory">Edit</a>
                    <form action="{{ route('manager.category.delete', $category) }}" method="post" class="d-inline">
                      @csrf
                      <button class="btn btn-danger" type="submit">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    {{ $category->links() }}
</div>

@endsection

@push('scripts')
@endpush