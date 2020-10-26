# Version manager for laravel projects

Semantic versioning for laravel project like {major.minor.patch}.

For example 0.1.2

## Install package
````
composer require ismailocal/laravel-version
````

## Generate version
````
php artisan version:generate
````

## Reset version
````
php artisan version:reset
````

## Version up
````
php artisan version:up {level}
````

{level} can be one of major,minor or patch

## Use in blade
````
@version
````