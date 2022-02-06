# Fitpass app
Check in users to sport centers and log number of check in.

## Installation
This project using composer. In CLI root project execute:
```
$ composer install
```

Set up database credentials in .env file and in CLI root of project execute:
```
$ php artisan migrate
$ php artisan db:seed
```
```
$ php artisan serve
```

## Usage

In URL with route "api/reception" pass two query parameters, object_uuid and card_uuid.
Example of correct route:
```
http://127.0.0.1:8000/api/reception?object_uuid=55501&card_uuid=48250
```

Extract Fitpass.postman_collection.json from root of the project into postman for more test cases.
In db, in tables user_cards and fitpass_objects you can find different values of card_uuid and object_uuid for test.


If is db::seed command is not possible import fitpass.sql from root of the project into db to get all required tables.
