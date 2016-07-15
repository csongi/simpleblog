# Simpleblog

This is a simple blog web application builded with Laravel framework.

Used laravel packages: "laravelcollective/html": "^5.2", "zizaco/entrust": "5.2.x-dev".

## Instalation

git clone

composer install

create/edit .env file (set CACHE_DRIVER=array)

php artisan migrate

php artisan db:seed

php artisan key:generate

Backend url: /admin
Login:
csongor.mihaly@yahoo.com/jel520 (seeded admin user, rights: create, update, delete, trash, restore)
or register as a blogger user (backend rights: view, trash, restore)
