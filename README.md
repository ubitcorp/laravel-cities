# laravel-cities
It provides continents, countries, cities (with div1 and div2) and districts.








# Installation
Via Composer

``` bash
composer require ubitcorp/laravel-cities
``` 

For publishing the configuration file:

``` bash
php artisan vendor:publish --provider="ubitcorp\Cities\Providers\ServiceProvider" 
``` 

Create the continents, countries, cities and districts and other tables:

``` bash
php artisan migrate
``` 

Seed the tables:
``` bash
php artisan db:seed --class=ubitcorp\\Cities\\Database\\Seeders\\CitiesDatabaseSeeder
``` 
 