@extends('tu.layouts.app') {{-- Assuming you have a layout file --}}

@section('content')
    <div class="container">
        <h1>Payment List</h1>
        {{-- Display a table of payments --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Payer Email</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->payer_email }}</td>
                        <td>{{ $payment->description }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->status }}</td>
                        <td>
                            <a href="{{ route('pembayaran.show', $payment->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('pembayaran.edit', $payment->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
