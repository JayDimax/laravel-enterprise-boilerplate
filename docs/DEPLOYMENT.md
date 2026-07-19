# Deployment

1. Provision PHP 8.4+, MySQL 8+, Composer 2, Node 20+, a queue worker, scheduler, and HTTPS.
2. Copy `.env.example` to `.env`; set production database, mail, cache and queue credentials; disable debug; use a unique administrator password.
3. Run `composer install --no-dev --optimize-autoloader`, `npm ci`, and `npm run build`.
4. Run `php artisan key:generate`, `php artisan storage:link`, and `php artisan migrate --seed --force`.
5. Run `php artisan optimize`; serve `public`, supervise queue workers, and schedule `php artisan schedule:run` every minute.
6. Back up database/storage, rotate secrets, restrict write access to `storage` and `bootstrap/cache`, and monitor logs and queues.

Enter maintenance mode before migrations and leave it only after health checks pass.
