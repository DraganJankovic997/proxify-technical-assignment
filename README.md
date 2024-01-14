## About Laravel

For more information on Laravel visit: https://laravel.com/docs/10.x

## About this project

This project is a Laravel application that implements the Fake Store API (https://fakestoreapi.com/docs), fetching the data and importing them into a local MySQL database.
Tools used are Laravel, PHP and MySQL.

## Code style

In this project we use Laravel Pint, with a default Laravel preset as a code style fixer.
You can run it by running `./vendor/bin/pint`.

## API Documentation

This project uses Scramble for API documentation.
You can access it via UI on `http://localhost:8000/docs/api` after running the project.
You can also see the OpenAPI documentation in JSON format on `http://localhost:8000/docs/api.json`.

## Project Setup

### Environment

Copy `.env.example` and rename it to `.env`.
Run `php artisan key:generate`.
Update the DB and FAKE_STORE properties.

### Database

To run this project you need to have a MySQL database instance ready.
If you do not have the instance ready, you can run it with Docker Compose using the configuration from the `docker-compose.yml` file.

Run `docker compose up -d` to run the database instance.
After the command runs, you can access the database on `localhost:3306` using credentials from your `.env` file.

## Usage

### Fetch products

You can execute product fetching by running `php artisan fetch-products`.
This command will fetch the products data from your FAKE_STORE endpoint and store it in the database.
