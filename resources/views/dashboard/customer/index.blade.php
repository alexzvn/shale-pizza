@extends('template.dashboard')

@section('content')
<div class ="card">
    <div class="card-body">
        <h1>
            Customer
        </h1>

        <table class="table table-stripped table-inverse">
            <thead class ="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Country</th>
                </tr>
            </thead>
            @foreach ($customers as $customer)
            <tbody>
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ \App\Enums\Gender::from($customer->gender)->name}}</td>
                    <td>{{ $customer->country }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('manager.customer.edit', $customer->id) }}" role="button" onsubmit="editCustomer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                        <form action="{{ route('manager.customer.delete', $customer->id) }}" method="post" class="d-line">
                        @csrf
                        <button class="btn btn-danger" type="submit" style="margin-top: 10px"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button></form>
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
