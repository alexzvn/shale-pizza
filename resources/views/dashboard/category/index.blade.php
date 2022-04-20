@extends('template.dashboard')

@section('content')
<div class ="card">
    <div class="card-body">
        <h1>
            Category
            <a class="btn btn-success" href="{{route('manager.category.create') }}" role="button">New Category</a>
        </h1> 

        <table class ="table table-striped table-inverse table-responsive">
            <thead class ="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($categories as $category)
            <tbody>
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('manager.category.edit', $category->id) }}" role="button" onsubmit="deleteCatergory">Edit</a>
                        <form action="{{ route('manager.category.delete', $category->id) }}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
{{-- @endpush --}}