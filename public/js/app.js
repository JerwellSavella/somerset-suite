(function () {
    var root = document.documentElement;
    var body = document.body;

    // Theme toggle (persisted)
    var themeBtn = document.getElementById('theme-toggle');
    function paintThemeIcon() {
        if (themeBtn) {
            themeBtn.textContent = root.getAttribute('data-theme') === 'dark' ? '☀' : '☾';
        }
    }
    if (themeBtn) {
        paintThemeIcon();
        themeBtn.addEventListener('click', function () {
            var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            root.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
            paintThemeIcon();
        });
    }

    // Sidebar open/close on mobile
    var toggle = document.getElementById('sidebar-toggle');
    var overlay = document.getElementById('sidebar-overlay');
    if (toggle) {
        toggle.addEventListener('click', function () { body.classList.toggle('sidebar-open'); });
    }
    if (overlay) {
        overlay.addEventListener('click', function () { body.classList.remove('sidebar-open'); });
    }

    // Close the user menu when clicking elsewhere
    document.addEventListener('click', function (e) {
        document.querySelectorAll('.user-menu[open]').forEach(function (d) {
            if (!d.contains(e.target)) { d.removeAttribute('open'); }
        });
    });
})();
