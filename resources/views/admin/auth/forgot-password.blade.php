@extends('layouts.login')

@section('content')
<div class="card-body">
    <form role="form" class="text-start" method="POST" action="{{ route('admin.password.email') }}">
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
