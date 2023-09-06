@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Pembayaran List</h1>
    <div class="mb-2">
        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary position-relative">Create Pembayaran</a>
        @foreach ($pembayaran as $p)
        <td>{{ $p->external_id }}</td>

        @endforeach

    </div>
    <div class="card">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>External ID</th>
                <th>Payer Email</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->external_id }}</td>
                    <td>{{ $p->payer_email }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->amount }}</td>
                    <td>{{ $p->status }}</td>
                    <td>
                        <!-- Add action buttons or links here -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>

</div>
@endsection
