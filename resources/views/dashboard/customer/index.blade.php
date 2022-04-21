@extends('template.dashboard')

@section('content')
<div class ="card">
    <div class="card-body">
        <h1>
            Customer
        </h1>

        <table class="table table-stripped table-inverse table-responsive">
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
                    <td>{{ \App\Enums\Gender::from($customer->gender)->name` }}</td>
                    <td>{{ $customer->country }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('manager.customer.edit', $customer->id) }}" role="button" onsubmit="editCustomer">Edit</a>
                        <form action="{{ route('manager.customer.delete', $customer->id) }}" method="post" class="d-line">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button></form>
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