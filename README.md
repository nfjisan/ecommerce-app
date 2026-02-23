## Overview

1.Ecommerce system
2.SSO login to Foodpanda
3.SSO uses Auth-server Passport Password Grant

## Requirements

1.PHP 8.2 or higher.
2.Composer
3.MySQL
4.Auth-server running

# Clone repository Setup Steps

git clone <ecommerce-app-repo>
cd ecommerce-app

composer install

Copy .env.example to .env

php artisan key:generate

DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=

# Configure Auth-server in .env

AUTH_SERVER=http://127.0.0.1:8000
CLIENT_ID=<passport-client-id>
CLIENT_SECRET=<passport-client-secret>

php artisan migrate
php artisan serve --port=8001
