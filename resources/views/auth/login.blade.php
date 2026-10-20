@extends('layouts.guest')

@section('title', 'Log in')
@section('heading', config('app.name'))
@section('subheading', 'Log in with your email or phone number')

@section('content')
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="field">
            <label for="email">Email or Phone Number</label>
            <input id="email" name="email" type="text" class="input" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <div class="field-row">
                <label for="password">Password</label>
                <a href="{{ route('password.request') }}" class="link small">Forgot your password?</a>
            </div>
            <input id="password" name="password" type="password" class="input" required autocomplete="current-password">
            @error('password') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <label class="check"><input type="checkbox" name="remember"> Remember me</label>

        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
@endsection
