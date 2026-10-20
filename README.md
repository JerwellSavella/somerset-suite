# Somerset Suite

Internal Laravel + Inertia + React application. Private use.

## Stack

- Laravel 13 (PHP 8.3)
- Inertia.js + React 19
- Tailwind CSS + shadcn/ui
- MariaDB

## Local Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
```

Serve via Apache vhost (see local dev notes) or:
```bash
php artisan serve
```

## Notes

- Auth is customized for login via email or phone (`app/Auth/CustomUserProvider.php`, `FortifyServiceProvider.php`) — not default Laravel/Fortify behavior.
- Most complex queries use the query builder directly rather than Eloquent, by design.
- Run `php artisan wayfinder:generate` after any route changes.

## License

Proprietary — see `LICENSE`.
