<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ config('app.name') }}</title>

    {{-- Apply saved/system theme before first paint to avoid a flash --}}
    <script>
        (function () {
            var t = localStorage.getItem('theme');
            if (!t) {
                t = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}">
    @stack('head')
</head>
<body>
    <header class="app-header">
        <button type="button" id="sidebar-toggle" class="icon-btn sidebar-toggle" aria-label="Toggle menu">☰</button>
        <a href="{{ route('dashboard') }}" class="brand">{{ config('app.name') }}</a>
        <div class="header-spacer"></div>
        <button type="button" id="theme-toggle" class="icon-btn" aria-label="Toggle theme"></button>
        <details class="user-menu">
            <summary>{{ auth()->user()->name }}</summary>
            <div class="menu">
                @includeIf('partials.user-menu-links')
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            </div>
        </details>
    </header>

    <div class="app-body">
        @include('partials.sidebar')
        <div class="sidebar-overlay" id="sidebar-overlay"></div>

        <main class="app-main">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @yield('content')
        </main>
    </div>

    <footer class="app-footer">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </footer>

    <script src="{{ asset('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}"></script>
    @stack('scripts')
</body>
</html>
