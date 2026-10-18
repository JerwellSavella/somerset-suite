@extends('layouts.guest')

@section('title', 'Forgot password')
@section('heading', 'Forgot password')
@section('subheading', 'Enter your email and we will send you a reset link')

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" class="input" value="{{ old('email') }}" required autofocus>
            @error('email') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Email password reset link</button>
        <a href="{{ route('login') }}" class="link small">Back to log in</a>
    </form>
@endsection
