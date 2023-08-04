@extends('layouts.login')

@section('content')
<div class="card-body">
    <form role="form" method="POST" action="{{ route('password.email') }}" class="text-start">
        @csrf
        <div class="input-group input-group-outline my-3">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</div>

@endsection
