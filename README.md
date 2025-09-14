# Taskify: Laravel Task Manager

<p align="center">
  <img src="URL_UNTUK_SCREENSHOT_ATAU_LOGO_NANTI" width="400">
</p>

A simple yet robust Task Management application built with Laravel 11. This project demonstrates core MVC principles, authentication, authorization (policies), and clean database structuring using Eloquent ORM.

## Features

- **User Authentication:** Secure user registration and login (built with Laravel Breeze).
- **Full CRUD Operations:** Users can Create, Read, Update, and Delete their own tasks.
- **Task Authorization:** Users can ONLY manage tasks that they created (implemented via Laravel Policies).
- **Task Status:** Mark tasks as 'Pending' or 'Completed'.
- **Clean UI:** Simple interface using Blade and Tailwind CSS.

## Tech Stack

- **Backend:** Laravel 11
- **Frontend:** Blade Templates & Tailwind CSS
- **Authentication:** Laravel Breeze
- **Database:** MySQL (atau PostgreSQL/SQLite)

---

## Installation & Setup

1.  Clone the repository:
    ```bash
    git clone https://github.com/muhtegaralfikri/taskify-laravel.git
    cd taskify-laravel
    ```

2.  Install composer dependencies:
    ```bash
    composer install
    ```

3.  Copy `.env.example` file to `.env` and configure your database:
    ```bash
    cp .env.example .env
    ```
    *(Pastikan setting DB_DATABASE, DB_USERNAME, DB_PASSWORD di file .env)*

4.  Generate application key:
    ```bash
    php artisan key:generate
    ```

5.  Run database migrations:
    ```bash
    php artisan migrate
    ```

6.  (Optional) Run seeders if available:
    ```bash
    php artisan db:seed
    ```

7.  Run the development server:
    ```bash
    php artisan serve
    ```