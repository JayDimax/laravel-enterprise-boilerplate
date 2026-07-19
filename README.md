# Laravel Enterprise Boilerplate

Open source Laravel template with authentication, role/permission management, and other production-ready starter features.

## Features

- Laravel 12 application structure
- Authentication scaffolding
- Role and permission support via Spatie Permission
- Tailwind-based frontend assets with Vite
- Database-backed sessions and queue support
- Admin seeder for quick setup

## Requirements

Before you start, make sure your machine has:

- PHP 8.2 or newer
- Composer
- Node.js 18+ and npm
- MySQL database
- Optional: Redis if you want to use cache/queue services

## Installation

1. Clone the repository

   ```bash
   git clone https://github.com/JayDimax/laravel-enterprise-boilerplate.git
   cd laravel-enterprise-boilerplate
   ```

2. Install PHP dependencies

   ```bash
   composer install
   ```

3. Create your environment file

   ```bash
   copy .env.example .env
   ```

   If you are using Linux or macOS:

   ```bash
   cp .env.example .env
   ```

4. Configure the database and app settings

   Open the `.env` file and update the following values:

   ```env
   APP_NAME=Laravel Enterprise Boilerplate
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://127.0.0.1:8000

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=enterprise_boilerplate
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   You can also customize the default admin account values if needed:

   ```env
   ADMIN_NAME="System Administrator"
   ADMIN_EMAIL=admin@example.com
   ADMIN_PASSWORD=ChangeMe123!
   ```

5. Generate the application key

   ```bash
   php artisan key:generate
   ```

6. Run the database migrations and seed the admin user

   ```bash
   php artisan migrate --seed
   ```

7. Install frontend dependencies

   ```bash
   npm install
   ```

8. Build or run the frontend assets

   For development:

   ```bash
   npm run dev
   ```

   For production build:

   ```bash
   npm run build
   ```

9. Start the Laravel development server

   ```bash
   php artisan serve --host=127.0.0.1 --port=8000
   ```

10. Open the app in your browser

   Visit:

   ```text
   http://127.0.0.1:8000
   ```

## Default Admin Login

After seeding, you can sign in using the default admin values from your `.env` file:

- Email: `admin@example.com`
- Password: `ChangeMe123!`

> Make sure to change the default admin password before using this project in a real environment.

## Notes

- If port `8000` is already in use by another PHP process, stop the conflicting instance or start the app on another port such as `8001`.
- For production deployment, use a proper web server configuration and build the frontend assets with `npm run build`.

## Contributing

Contributions are welcome. Please fork the repository, make your changes, and open a pull request.

## License

This project is open source and available under the MIT license.
