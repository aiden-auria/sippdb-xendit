@extends('layouts.login')

@section('content')


<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
    </div>
</div>

<div class="card-body">
    <form role="form" class="text-start" method="POST" action="{{ route('admin.password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="input-group input-group-outline my-3">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="input-group input-group-outline mb-3">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="input-group input-group-outline mb-3">
            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="text-center">
            <input type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" value="{{ __('Reset Password') }}">
        </div>
    </form>
</div>

@endsection
