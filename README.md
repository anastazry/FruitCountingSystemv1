# Fruit Counting System

Laravel 12 application for managing workers, harvest assignments, QR codes, fruit counts, deliveries and reporting.

See [Local development](docs/local-development.md) for installation, test accounts, the optimized Windows startup command and code structure.

Once dependencies and local data are configured:

```powershell
npm run build
.\scripts\serve.ps1
```

Open http://127.0.0.1:8085. Run `php artisan test` to verify the application against an isolated in-memory database.
