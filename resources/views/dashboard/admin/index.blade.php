@extends('template.dashboard')

@section('content')
<div class="widget widget-content-area br-4">
  <div class="widget-one">

    <h1>
      Manage admins
      <a class="btn rounded-circle btn-success" href="{{ route('manager.admin.create') }}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>
    </h1>

    <table class="table table-striped table-inverse mt-5">
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
            <td class="text-center">
              <ul class="table-controls">
                <li>
                  <a class="btn btn-primary @if(session('admin')->id !== $admin->id) disabled @endif" href="{{ route('manager.admin.edit', $admin->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
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

@push('scripts')
@endpush
