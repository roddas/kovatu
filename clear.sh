#!/bin/bash

php artisan basset:clear
php artisan basset:internalize
php artisan optimize:clear

# 419 ERROR
# https://github.com/Laravel-Backpack/community-forum/discussions/576