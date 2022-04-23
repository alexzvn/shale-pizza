@extends('template.dashboard')

@section('content')
<div class="card">
  <div class="card-body">
    <h1>
      Manage admins
      <a class="btn btn-success" href="{{ route('manager.admin.create') }}" role="button">Add new</a>
    </h1>

    <table class="table table-striped table-inverse table-responsive">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($admins as $admin)
          <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
              <a class="btn btn-secondary" href="{{ route('manager.admin.edit', $admin->id) }}" role="button" onsubmit="deleteAdmin">Edit</a>
              {{-- <form action="{{ route('manager.admin.delete', $admin->id) }}" method="post" class="d-inline">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
              </form> --}}
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
@endpush
