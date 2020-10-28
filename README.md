# Version manager for laravel projects

Semantic versioning for laravel project like {major.minor.patch}.

For example 0.1.2

## Install package
````
composer require ismailocal/laravel-version
````

## Version generate
````
php artisan version:generate
````
Now you can find version.json file in your base_path.

## Version reset
````
php artisan version:reset
````

## Version check
````
php artisan version:check
````

## Version up
````
php artisan version:up {level}
````
{level} can be one of major,minor or patch

Version up command upgrading your current version in version.json. 

Then after that version.json file will be commit and push your current branch on your repo. 

If this process successfuly done then that version will be tag and push your current repo.

## Use in blade
````
@version
````
