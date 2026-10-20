@extends('layouts.guest')

@section('title', 'Reset password')
@section('heading', 'Reset password')
@section('subheading', 'Choose a new password')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="field">
            <label for="email">Email address</label>
            <input id="email" name="email" type="email" class="input" value="{{ old('email', $request->email) }}" required>
            @error('email') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div class="field">
            <label for="password">New password</label>
            <input id="password" name="password" type="password" class="input" required autocomplete="new-password">
            @error('password') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div class="field">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="input" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary">Reset password</button>
    </form>
@endsection
