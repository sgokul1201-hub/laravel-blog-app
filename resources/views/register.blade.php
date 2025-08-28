@extends('layout')

@section('content')
<div class="auth-box">
    <h3>Register</h3>

    @if(session('success'))
        <p class="success-msg">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p class="error-msg">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group">
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
            @error('name')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
            @error('password')<p class="error-msg">{{ $message }}</p>@enderror
        </div>

        <button type="submit" name="register">Register</button>

        <p>Already have an account? <a href="{{ url('login') }}">Login</a></p>
    </form>

    <!-- 🔹 Back Button -->
    <a href="{{ url('/') }}" class="back-btn">← Back</a>
</div>
@endsection
