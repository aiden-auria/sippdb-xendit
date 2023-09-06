@extends('tu.layouts.app') {{-- Assuming you have a layout file --}}

@section('content')
    <div class="container">
        <h1>Create Payment</h1>
        {{-- Your form for creating a payment --}}
        <form method="POST" action="{{ route('pembayaran.store') }}">
            @csrf
            {{-- Form fields and validation errors --}}
            <div class="form-group">
                <label for="payer_email">Payer Email:</label>
                <input type="email" name="payer_email" class="form-control" value="{{ old('payer_email') }}" required>
                @error('payer_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" required>
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Payment</button>
        </form>
    </div>
@endsection
