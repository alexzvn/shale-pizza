[![CodeFactor](https://www.codefactor.io/repository/github/alexzvn/shale-pizza/badge)](https://www.codefactor.io/repository/github/alexzvn/shale-pizza)
[![Test](https://github.com/alexzvn/shale-pizza/actions/workflows/laravel.yml/badge.svg)](https://github.com/alexzvn/shale-pizza/actions/workflows/laravel.yml)

# Shale-pizza Install steps

Use git clone and run all command bellow:

```bash
composer install
cp .env.example .env
php artisan key:gen
php artisan migrate:fresh
```
