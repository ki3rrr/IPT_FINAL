# Flowers Shop Management System (Laravel, no login)

This is a local-development flower shop admin CRUD application built with Laravel 11/12 and MySQL. It has a dashboard and CRUD pages for Categories, Flowers, Suppliers, Customers, and Orders. Login was removed as requested, so **do not expose this application to the public internet**.

## Requirements (Windows)

1. PHP 8.2 or newer (XAMPP's PHP is fine if it is 8.2+).
2. Composer 2.
3. MySQL/MariaDB (XAMPP users can use phpMyAdmin).
4. Internet access for Composer to download Laravel dependencies and for the Bootstrap/Google Fonts CDN used by the interface.

Check PHP and Composer in a new terminal:

```bat
php -v
composer --version
```

If `composer` is not recognized, install Composer for Windows, select the PHP executable from your XAMPP installation when prompted, then close and reopen the terminal.

## Exact setup steps

### 1. Extract the ZIP

Extract this ZIP to a simple path, for example `C:\projects\FlowerShopLaravel`. Open that folder in VS Code. Make sure the folder you opened contains `artisan`, `composer.json`, and the `app`, `routes`, and `database` folders.

### 2. Start MySQL and create a NEW database

For XAMPP users:

1. Open XAMPP Control Panel.
2. Start **MySQL**.
3. Open `http://localhost/phpmyadmin` in your browser.
4. Click **New**.
5. Enter `flower_shop_fixed` as the database name.
6. Click **Create**.

Use this new database to avoid conflicts with old tables from earlier versions. Do not run `migrate:fresh` against a database containing data you want to keep.

### 3. Check `.env`

The project already includes a `.env` file. Open it and confirm these settings match your local MySQL setup:

```dotenv
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=flower_shop_fixed
DB_USERNAME=root
DB_PASSWORD=
```

For a typical local XAMPP install, the username is `root` and the password is blank. If you set a MySQL password, put it after `DB_PASSWORD=`. Do not put quotes around the password unless they are part of the password.

### 4. Install the PHP packages

In VS Code, open **Terminal → New Terminal**. Check that the terminal path is the project folder, then run one command at a time:

```bat
composer install
```

Wait for it to finish before continuing. If this fails, check that PHP and Composer are installed and that the terminal is in the folder containing `composer.json`.

### 5. Generate the app key and clear cached settings

Run:

```bat
php artisan key:generate
php artisan optimize:clear
```

### 6. Create the tables and sample data

Run:

```bat
php artisan migrate --seed
```

This creates the tables and adds sample categories, suppliers, flowers, a customer, and a sample order. The seeder uses `firstOrCreate`/`updateOrCreate` to avoid duplicating seeded records when run again against this schema.

### 7. Start Laravel

Run:

```bat
php artisan serve
```

Keep this terminal open while using the app. Open this URL:

`http://127.0.0.1:8000`

The dashboard should appear. You can also visit `http://127.0.0.1:8000/admin`.

## If an error appears

- **`composer` is not recognized**: install Composer, ensure it uses PHP 8.2+, then reopen VS Code/terminal.
- **`could not find driver`**: enable `pdo_mysql` in the `php.ini` used by the terminal, restart the terminal, and check `php -m` includes `pdo_mysql`.
- **`Unknown database 'flower_shop_fixed'`**: create the database in phpMyAdmin as described above, or correct `DB_DATABASE` in `.env`.
- **`Access denied for user 'root'`**: update `DB_USERNAME` and `DB_PASSWORD` in `.env` to match your MySQL account.
- **Duplicate category / old schema errors**: make sure `.env` points to the new `flower_shop_fixed` database, then run `php artisan optimize:clear` followed by `php artisan migrate --seed`. Do not delete old databases or use `migrate:fresh` unless you intentionally want to erase all tables/data in the selected database.
- **Page shows a Laravel exception**: copy the complete terminal/browser error, especially the first exception message and file/line, and share it for diagnosis.

## Modules

- Dashboard
- Categories: create, view list, edit, delete
- Flowers: create, view list, edit, delete; linked to category and supplier
- Suppliers: create, view list, edit, delete
- Customers: create, view list, edit, delete
- Orders: create, view list, edit, delete; choose customer, flowers, quantities, and status
- Light/dark theme switch

## Important security note

There is intentionally no login page or authentication. Anyone who can reach the running app can use the admin pages. Use only on your own computer or a trusted private network. Add authentication before any public deployment.
