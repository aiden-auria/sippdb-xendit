@extends('tu.layouts.app') {{-- Assuming you have a layout file --}}

@section('content')
    <div class="container">
        <h1>Payment Details</h1>
        {{-- Display payment details --}}
        <ul>
            <li><strong>Payment ID:</strong> {{ $pembayaran->id }}</li>
            <li><strong>Payer Email:</strong> {{ $pembayaran->payer_email }}</li>
            <li><strong>Description:</strong> {{ $pembayaran->description }}</li>
            <li><strong>Amount:</strong> {{ $pembayaran->amount }}</li>
            <li><strong>Status:</strong> {{ $pembayaran->status }}</li>
            <li><strong>Checkout Link:</strong> <a href="{{ $pembayaran->checkout_link }}"
                    target="_blank">{{ $pembayaran->checkout_link }}</a></li>
        </ul>
        {{-- Add more details or actions as needed --}}
    </div>
@endsection
