# Rest Api

As a customer, it adds an item into the basket and fetch all items in his/her basket"

## Getting Started

These instructions will get you a copy of the project up and running on your machine

### Prerequisites

PHP 7, MySql, Apache

### Installing & running

1. Clone repository https://github.com/Mohinik11/RestApi.git
2. open terminal, and run following commands
3. `cd {location to RestApi}/RestApi`
4. `composer install`
5. `vendor/bin/phpab -o src/autoload.php -b src src http tests db`
6. create database `restapi` or change env file according to your configuration
7. `vendor/bin/phinx migrate`
8. `vendor/bin/phinx seed:run -s UserSeeder`
9. `vendor/bin/phinx seed:run -s ProductSeeder`
10. `vendor/bin/phinx seed:run -s BasketSeeder`
11. create virtual host : `api.local`
12. Run API with following data 
	url - `http://api.local/basket`
	method - POST
	data - `{"user_id":"1","product_id":"2","quantity": "3"}`

	url - `http://api.local/basket/1`
	method - GET

## Running tests

1. open terminal, and run following commands
2. `cd {location to RestApi}/RestApi`
3. `vendor/bin/phpunit tests`
