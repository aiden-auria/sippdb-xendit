@extends('tu.layouts.app') {{-- Assuming you have a layout file --}}

@section('content')
    <div class="container">
        <h1>Edit Payment</h1>
        {{-- Your form for editing a payment --}}
        <form method="POST" action="{{ route('pembayaran.update', $pembayaran->id) }}">
            @csrf
            @method('PUT')
            {{-- Form fields and current values --}}
            <div class="form-group">
                <label for="payer_email">Payer Email:</label>
                <input type="email" name="payer_email" class="form-control" value="{{ $pembayaran->payer_email }}" required>
                {{-- Add validation errors if needed --}}
            </div>
            {{-- Add more fields for editing --}}
            <button type="submit" class="btn btn-primary">Update Payment</button>
        </form>
    </div>
@endsection
