# Local development

Requirements: PHP 8.2+ (GD, SQLite, XML, mbstring and ZIP), Composer, Node.js and npm.

From the project directory:

```powershell
composer install
npm ci
Copy-Item .env.example .env
New-Item database/database.sqlite -ItemType File
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run build
.\scripts\serve.ps1
```

Copy the environment file and create the SQLite file only on first setup. Keep existing files on subsequent runs. The seed creates test accounts with password `12341234`; the admin email is `admin@test.com`.

Open http://127.0.0.1:8085. The server binds only to localhost. Stop it with Ctrl+C.
If PHP is not on PATH, the script detects Laragon or accepts `-PhpPath C:\path\to\php.exe`. Use `-Port 8086` to select another port.

The script enables OPcache when available, only for its PHP process. Timestamp validation remains enabled so PHP edits take effect immediately. It does not change the global php.ini. The first request warms the cache; subsequent requests should be faster.

After CSS/JavaScript edits, run `npm run build`. Alternatively, run `npm run dev` in another terminal for live asset updates.

Run `php artisan test` for the test suite. Tests use a separate in-memory SQLite database.

## Structure

- `routes/web.php`: authenticated route groups and authorization boundaries.
- `app/Http/Controllers/DashboardController.php`: user counts and harvest summaries.
- `app/Http/Controllers/AdminController.php`: user and assignment management.
- `resources/views/layouts/partials/`: shared header, sidebar and breadcrumb.
- `resources/js/pages/assignment-calendar.js`: assignment calendar behavior.
- `resources/css/app.css`: shared styles, built with Tailwind and Preline.

Shared pages use local Vite assets instead of remote template bundles, runtime Tailwind or unused chart/realtime libraries. The assignment list eager-loads today's harvest records in one query rather than querying once per assignment. The summary aggregates harvest values in SQL rather than loading every harvest record into PHP memory.
