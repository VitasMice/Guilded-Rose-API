# Laravel 8.0 blog

Simple Laravel API for Guilded-Rose-Kata. API uses sqlite as database

## Installation


Setting up your development environment on your local machine :
```bash
$ git clone https://github.com/guillaumebriday/laravel-blog.git
$ cd laravel-blog
$ cp .env.example .env
$ composer install
$ php artisan serve
```

Now you can access the application via [http://localhost:8000](http://localhost:8000).

## Before starting
You need to run the migrations with the seeds :
```bash
$ artisan migrate --seed
```

## Available endpoints
 * Create category (POST)                           /api/category
 * Create item (POST)                               /api/item
 * Update item (PUT)                                /api/item/{id}
 * Return all items based on category (GET)         /api/category-items/{category-id}
 * Delete all items based on category (DELETE)      /api/category-items/{category-id}