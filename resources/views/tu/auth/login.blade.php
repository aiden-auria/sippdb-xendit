@extends('layouts.login')

@section('content')


<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login Tata Usaha</h4>
    </div>
</div>

<div class="card-body">
    <form method="POST" action="{{ route('tu.login') }}" class="text-start">
        @csrf

        <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check form-switch d-flex align-items-center mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
        </div>

        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
        </div>

        @if (Route::has('password.request'))
        <p class="mt-4 text-sm text-center">
            <a href="{{ route('tu.password.request') }}">Forgot your password?</a>
        </p>
        @endif
    </form>
</div>

@endsection
