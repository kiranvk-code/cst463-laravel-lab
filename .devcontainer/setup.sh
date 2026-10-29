#!/usr/bin/env bash
# Runs once when the Codespace is created: installs Laravel's packages and builds the sample database.
set -e
composer install --no-interaction --prefer-dist --no-progress
[ -f .env ] || cp .env.example .env
php artisan key:generate --force
touch database/database.sqlite
php artisan migrate:fresh --seed --force
echo ""
echo "✅ Ready. Start the app with:   php artisan serve"
