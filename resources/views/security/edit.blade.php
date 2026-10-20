@extends('layouts.app')

@section('title', 'Security')

@section('content')
    <h1 class="page-title">Security</h1>
    <p class="page-desc">Change your password</p>

    <form method="POST" action="{{ route('security.update') }}" class="card narrow">
        @csrf
        @method('PUT')

        <div class="stack">
            <div class="field">
                <label for="current_password">Current password</label>
                <input id="current_password" name="current_password" type="password" class="input" required autocomplete="current-password">
                @error('current_password') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div class="field">
                <label for="password">New password</label>
                <input id="password" name="password" type="password" class="input" required autocomplete="new-password">
                @error('password') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div class="field">
                <label for="password_confirmation">Confirm new password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="input" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update password</button>
        </div>
    </form>
@endsection
