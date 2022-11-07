### Book API

This book API calls an external API service which is the [Ice And Fire API](https://www.anapioficeandfire.com/api/books) to get information about books and also implements its own database and has basic
CRUD functions.
It also includes the feature tests

# Getting Started

# Requirements
  - PHP Server - EC2 Ubuntu Instance
  - MySQL
  - All variables are declared under ``

Clone the Repository on target machine:


    git clone https://github.com/kayxleem/books-api.git
    cd books-api

Set up your .env

    DB_DATABASE=laravel (Replace with yours)
    DB_USERNAME=root (Replace with yours)
    DB_PASSWORD= (Replace with yours)


Install dependencies (if you have `composer` locally):

    composer install

Run database migrations:

    php artisan migrate

Run Test

    php artisan test

Seed the database:

    php artisan db:seed --class=BookSeeder

## Usage

The API should be available at http://localhost:3000/api (You can change the APP_PORT in .env file) if you are using artisan serve.

## End Points

External endpoint

    GET /api/external-books?name=:nameOfABook

Returns result from [Ice And Fire API](https://www.anapioficeandfire.com/api/books)

Create

    POST /api/v1/books

Read

    GET /api/v1/books

Update

    PATCH /api/v1/books/:id

Delete

    DELETE /api/v1/books/:id

Alternative Delete

    POST /api/v1/books/:id/delete




