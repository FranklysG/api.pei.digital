<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://buzzvel.com/storage/images/logo-light.svg" width="300"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

#### Postal code backend

##### Create .env : 

```yml
cp .env-example .env
```

Open this project in other terminal and run 
##### Docker run : 

```yml
docker-compose up
```

On project vscode terminal run, one and one
##### Compose and Migrations : 

```yml
docker exec -it postalcode_web composer install
docker exec -it postalcode_web php artisan migrate:fresh --seed
```