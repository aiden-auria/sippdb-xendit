@extends('admin.layouts.app')

@section('title', 'Create Payment')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Create Payment</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="align-items-center justify-content-center mb-0">
                <form method="POST" action="{{ route('pembayaran.store') }}" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="payer_email">Email address</label>
                            <input type="email" class="form-control" id="payer_email" aria-describedby="emailHelp" name="payer_email" required placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required placeholder="Amount">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
