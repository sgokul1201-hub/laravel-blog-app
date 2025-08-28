@extends('layout')

@section('content')
<div class="auth-box">
    <h3>Login</h3>

    @if(session('success'))
        <p class="success-msg">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
            @error('password')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <button type="submit" name="login">Login</button>

        <p>Don’t have an account? <a href="{{ url('register') }}">Register</a></p>
    </form>

    <!-- Back Button -->
    <a href="{{ url('/') }}" class="back-btn">← Back</a>
</div>
@endsection
