## Laravel project TodoList/Tasks

1. Setting up the environment

``bash``
composer create-project --prefer-dist laravel/laravel my-project

## Installing Jetstream

``bash``
composer require laravel/jetstream

## Set up Jetstream to use Livewire

``bash``
php artisan jetstream:install livewire

## Install and build dependencies

``bash``
npm install && npm run dev

## Migrate the database

``bash``
php artisan migrate

2. Creating Database Migration for to-do list

docker-compose exec app php artisan make:model TodoItem
docker-compose exec app php artisan make:migration create-todo-items-table

## USERS TESTS

role: Admin, Email: admin@admin.com, Password: password
role: User, Email: user@user.com, Password: password

