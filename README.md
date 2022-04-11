# Shale-pizza Install steps

Use git clone and run all command bellow:

```bash
composer install
cp .env.example .env
php artisan key:gen
php artisan migrate:fresh
```
