# Beatmonkey

Beatmonkey is an intuitive online platform designed specifically for music producers and artists to easily upload, manage, discover, and download beats. Whether you’re a producer showcasing your latest creations or an artist hunting for the perfect beat to inspire your next track, Beatmonkey streamlines the entire process.

Built with a user-friendly interface, Beatmonkey allows users to upload beats with detailed metadata such as genre and BPM, making it simple to organize and find exactly what they need. Artists can listen to and download beats directly from the platform without needing to leave or download large files unnecessarily.

# Features

-   Account system
-   Upload beats with beat meta data like genre and bpm
-   View, edit, download, delete beats
-   Download and listen to other artists beats, without having to download them
-   Filter on genre, bpm or search by name
-   Like or dislike beats
    ![Screenshot of Beatmonkey app](./public/beatmonkey%20readme%20ss.png)

This is a Laravel project utilizing Blade templating, Vite for asset bundling, Composer for dependency management, and Laravel Valet for local development.

---

## Technologies Used

-   PHP 8.0+
-   Laravel Framework 9.x
-   Blade Templating
-   Vite (via laravel-vite-plugin) for assets (JS & SCSS)
-   Composer for PHP dependencies
-   npm for JS dependencies
-   Laravel Sanctum for authentication
-   Laravel UI
-   Laravel Valet (macOS local dev environment)
-   MySQL Database

---

## Installation

Follow these steps to set up the project locally:

1. Clone the repository

```bash
git clone https://github.com/yourusername/your-laravel-project.git
cd your-laravel-project
```

2. Install PHP dependencies with Composer

```bash
composer install
```

3. Install JavaScript dependencies with npm

```bash
npm install
```

4. Set up environment file

Copy the example .env.example file to .env:

```bash
cp .env.example .env
```

Edit the .env file to set your database credentials and other environment-specific variables.

5. Generate application key

```bash
php artisan key:generate
```

6. Run database migrations

```bash
php artisan migrate
```

7. Serve the project with Laravel Valet

Make sure you have Laravel Valet installed globally.

```bash
valet link beatmonkey
valet secure beatmonkey
```

Visit the project at https://your-laravel-project.test

Alternatively, you can serve with Artisan (less preferred if using Valet):

```bash
php artisan serve
```

8. Build and run Vite for asset bundling
   For development (hot reload):

```bash
npm run dev
```

For production (build assets):

```bash
npm run build
```

---

## Common Commands Summary

| Command                    | Description                                 |
| :------------------------- | :------------------------------------------ |
| `composer install`         | Install PHP dependencies                    |
| `npm install`              | Install JS dependencies                     |
| `cp .env.example .env`     | Copy environment variables template         |
| `php artisan key:generate` | Generate application encryption key         |
| `php artisan migrate`      | Run database migrations                     |
| `php artisan db:seed`      | Seed the database (optional)                |
| `npm run dev`              | Run Vite dev server with hot reload         |
| `npm run build`            | Build production assets                     |
| `valet link`               | Link project folder for Laravel Valet       |
| `valet secure`             | Secure the site with HTTPS in Valet         |
| `php artisan serve`        | Start built-in PHP dev server (alternative) |

## Project Structure

`app/` – Core application code (models, controllers, etc.)

`resources/views/` – Blade templates for frontend views

`resources/js/` – JavaScript source files bundled by Vite

`resources/sass/` – SCSS stylesheets bundled by Vite

`routes/web.php` – Web routes

`database/migrations/` – Database migration files

`tests/` – PHPUnit tests

## Environment Variables

Important variables to configure in `.env`:

`APP_NAME` – Application name (e.g., Beatmonkey)

`APP_URL` – Local URL for your app

`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` – Database connection details

`MAIL\_\*` – Mailer configuration (optional)

`PUSHER_*` and `VITE_PUSHER_*` – For broadcasting with Pusher (if used)
