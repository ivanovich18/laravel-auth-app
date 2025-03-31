# Laravel Auth App - Basic Setup

Simple Laravel 12 application with Breeze authentication (Email/Password + Google Login via Socialite) configured to use SQLite.

---

## Prerequisites

-   PHP (>= 8.2 recommended)
-   Composer
-   Node.js & npm
-   Git
-   SQLite (PHP extension enabled)

---

## Setup Instructions

1.  **Clone:**

    ```bash
    git clone https://github.com/ivanovich18/laravel-auth-app.git laravel-auth-app
    cd laravel-auth-app
    ```

2.  **Install Dependencies:**

    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup:**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Configure `.env` File:**
    Open the `.env` file and set _at least_ the following:

    ```dotenv
    DB_CONNECTION=sqlite

    # Add your Google OAuth Credentials
    GOOGLE_CLIENT_ID=YOUR_GOOGLE_CLIENT_ID
    GOOGLE_CLIENT_SECRET=YOUR_GOOGLE_CLIENT_SECRET
    GOOGLE_REDIRECT_URI=[http://127.0.0.1:8000/auth/google/callback](http://127.0.0.1:8000/auth/google/callback)
    ```

    _(Remove or comment out other `DB_`variables like`DB*HOST`, `DB_DATABASE` etc.)*

5.  **Clear Config Cache (Recommended):**

    ```bash
    php artisan config:clear
    ```

6.  **Prepare Database:**

    ```bash
    touch database/database.sqlite
    php artisan migrate
    ```

    _(Ensure migrations include adding the `google_id` column to the `users` table)_

7.  **Compile Assets:**

    -   For development: `npm run dev`
    -   For production: `npm run build`

8.  **Run Development Server:**
    ```bash
    php artisan serve
    ```

---

## Access

-   **Homepage:** `http://127.0.0.1:8000/`
-   **Login:** `http://127.0.0.1:8000/login`
-   **Register:** `http://127.0.0.1:8000/register`

---
