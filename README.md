## About Laravel

For more information on Laravel visit: https://laravel.com/docs/10.x

## About this project

This project is a Laravel application that implements the Fake Store API (https://fakestoreapi.com/docs), fetching the data and importing them into a local MySQL database.
Tools used are Laravel, PHP and MySQL.

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

### Update product

You can update the product title, description, price and image values using a REST API call.
The request should be sent to `/product/{uuid}` endpoint using a `PUT` request.
Keep in mind that you can use an `Accept: application/json` header, to get validation errors as a JSON array.
Bellow you can find a valid payload example
```
{
    "title": "Example title",
    "description": "Example for a valid description...",
    "price": 99.99,
    "image": "http://example.com/some_image"
}
```
