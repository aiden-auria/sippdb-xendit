@extends('admin.layouts.app')

@section('title', 'pembayaran')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">pembayaran</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payer Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Checkout Link</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->payer_email }}</td>
                                <td>{{ $payment->description }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->status }}</td>
                                <td>
                                    <a href="{{ $payment->checkout_link }}" target="_blank">{{ $payment->checkout_link }}</a>
                                </td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
