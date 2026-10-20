@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @if (auth()->user()->default_password)
        <div class="alert alert-danger">
            You are still using the default password.
            <a href="{{ route('security.edit') }}" class="link">Change it now</a>.
        </div>
    @endif

    <h1 class="page-title">Welcome {{ auth()->user()->first_name }} to Somerset Congregation</h1>
    <p class="page-desc">Use the Explorer menu to open the systems you have access to.</p>
@endsection
