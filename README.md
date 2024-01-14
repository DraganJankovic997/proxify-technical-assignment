## About Laravel

For more information on Laravel visit: https://laravel.com/docs/10.x

## About this project

This project is a Laravel application that implements the Fake Store API (https://fakestoreapi.com/docs), fetching the data and importing them into a local MySQL database.
Tools used are Laravel, PHP and MySQL.

### Code style

For code formatting and style consistency, this project utilizes Laravel Pint with a preset of Laravel.
To apply the code styles, please run the following command in your terminal: `./vendor/bin/pint`.

### API Documentation

For detailed insights into the API, this project employs Scramble for API documentation.
You can access it via UI on `http://localhost:8000/docs/api` after running the project.
You can also see the OpenAPI documentation in JSON format on `http://localhost:8000/docs/api.json`.

### Testing

To run the tests via Laravel's artisan command, navigate to the project root directory and use the following command: `php artisan test`

### Fetch products command

You can execute product fetching by running `php artisan fetch-products`.
This command will fetch the products data from your FAKE_STORE endpoint and store it in the database.

## Project Setup

### Prerequisites

Before you set up this project, you will need to install PHP 8.1 and Composer.
You will also need to have either MySQL instance running, or Docker to run the pre-configured container.

### Environment

Copy `.env.example` and rename it to `.env`.
Run `php artisan key:generate`.
Update the DB and FAKE_STORE properties.

### Database

This project requires a MySQL database instance to function. If you don't have a MySQL instance ready, you could utilize Docker Compose to spin up a database instance quickly using the configuration from the `docker-compose.yml` file.

To initiate the MySQL instance with Docker, run the following command: `docker compose up -d` to run the database instance.
After the command runs, you can access the database on `localhost:3306` using credentials from your `.env` file.
