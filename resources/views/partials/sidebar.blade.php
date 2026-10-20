<nav class="app-sidebar" id="app-sidebar" aria-label="Main navigation">
    <ul class="nav-list">
        <li>
            <a href="{{ route('dashboard') }}" @class(['active' => request()->routeIs('dashboard')])>Dashboard</a>
        </li>
    </ul>

    <p class="nav-label">Explorer</p>
    <ul class="nav-list">
        @forelse ($systems as $system)
            <li>
                <a href="{{ $system->is_sso ? route('sso.launch', $system->id) : $system->sys_link }}">
                    {{ $system->sys_name }}
                </a>
            </li>
        @empty
            <li class="muted small" style="padding: .45rem .75rem">No systems assigned.</li>
        @endforelse
    </ul>
</nav>
