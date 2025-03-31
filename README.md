# Laravel Auth App with Breeze, Sanctum, SQLite, and Google Login

This is a Laravel 12 application demonstrating user authentication using multiple methods: standard email/password registration and login (via Laravel Breeze) and social authentication using Google (via Laravel Socialite). It is configured to use SQLite as its database, making setup simple. Laravel Sanctum is included for potential future API/SPA authentication needs.

**Project Generated On:** Sunday, March 30, 2025

---

## Features

-   User Registration (Email/Password)
-   User Login (Email/Password)
-   Password Reset Functionality
-   Login with Google Account (OAuth 2.0 via Socialite)
-   Basic Dashboard page after login
-   Uses SQLite for simple database setup
-   Frontend scaffolding provided by Laravel Breeze (Blade stack)
-   Laravel Sanctum included (configured mainly for SPA/API use if extended later)

---

## Prerequisites

Before you begin, ensure you have the following installed:

-   PHP >= 8.2
-   Composer
-   Node.js & npm
-   Git
-   SQLite (Usually included with PHP, but ensure the `php-sqlite3` extension is enabled if needed)

---

## Installation & Setup

Follow these steps to get the application running locally:

1.  **Clone the Repository:**

    ```bash
    git clone <your-repository-url> laravel-auth-app
    cd laravel-auth-app
    ```

    _(Replace `<your-repository-url>` with the actual URL of your GitHub repository)_

2.  **Install PHP Dependencies:**

    ```bash
    composer install
    ```

3.  **Create Environment File:**
    Copy the example environment file:

    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5.  **Configure Environment (.env file):**
    Open the `.env` file and configure the following settings:

    -   **Database:** Set it to use SQLite. Remove or comment out other `DB_*` variables not needed for SQLite.

        ```dotenv
        DB_CONNECTION=sqlite
        # DB_HOST=127.0.0.1
        # DB_PORT=3306
        # DB_DATABASE=laravel
        # DB_USERNAME=root
        # DB_PASSWORD=
        ```

    -   **Google Credentials:** Add your Google OAuth 2.0 Client ID and Secret, and set the correct Redirect URI. You get these from the [Google Cloud Platform Console](https://console.cloud.google.com/).
        ```dotenv
        GOOGLE_CLIENT_ID=YOUR_GOOGLE_CLIENT_ID
        GOOGLE_CLIENT_SECRET=YOUR_GOOGLE_CLIENT_SECRET
        # Ensure this matches EXACTLY what's in your Google Cloud Console Authorized Redirect URIs
        GOOGLE_REDIRECT_URI=[http://127.0.0.1:8000/auth/google/callback](http://127.0.0.1:8000/auth/google/callback)
        ```
    -   **App URL (Optional but Recommended):** Set your local application URL.
        ```dotenv
        APP_URL=[http://127.0.0.1:8000](http://127.0.0.1:8000)
        ```

6.  **Create SQLite Database File:**
    Create the empty database file in the `database` directory:

    ```bash
    touch database/database.sqlite
    ```

7.  **Run Database Migrations:**
    This will create the `users`, `password_reset_tokens`, `sessions`, etc., tables. It should also include the migration to add the `google_id` column to the `users` table (ensure this migration exists in `database/migrations/`).

    ```bash
    php artisan migrate
    ```

8.  **Install Frontend Dependencies:**

    ```bash
    npm install
    ```

9.  **Compile Frontend Assets:**
    For development (with hot reloading):

    ```bash
    npm run dev
    ```

    For production:

    ```bash
    npm run build
    ```

10. **Clear Cached Configuration (Important after .env changes):**
    ```bash
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    ```

---

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```
