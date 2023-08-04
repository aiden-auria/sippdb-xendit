@extends('layouts.login')

@section('content')
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">reset password TU</h4>
    </div>
</div>

<div class="card-body">
    <form role="form" class="text-start" method="POST" action="{{ route('tu.password.email') }}">
        @csrf
        <div class="input-group input-group-outline my-3">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="text-center">
            <input type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" value="{{ __('Email Password Reset Link') }}">
        </div>
    </form>
</div>

@endsection
