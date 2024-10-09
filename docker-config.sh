#!/bin/bash

# Wait for MySQL to be ready
until mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" -e "SELECT 1;" &> /dev/null; do
  echo "Waiting for MySQL to be ready..."
  sleep 5
done

# Run migrations
echo "Running migrations..."
php artisan migrate

# Seed the database
echo "Seeding the database..."
php artisan db:seed

# Start the Laravel server
echo "Starting the Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
