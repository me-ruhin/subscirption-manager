Project Installation Guide Line

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)
 

Clone the repository

    git clone https://github.com/me-ruhin/subscirption-manager

Switch to the repo folder

    cd rise-up-project

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Queue settings

     QUEUE_CONNECTION=database
     php artisan qeue:work 




Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Then the database seeder (**At first migrate all the tables**)

    php artisan db:seed
Or You can run migration with the seeder
    php artisan migrate --seed 

Start the local development server

    php artisan serve // http://localhost/subscirption-manager/public

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/me-ruhin/subscirption-manager
    cd rise-up-project
    composer install
    cp .env.example .env
    php artisan key:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan db:seed
    php artisan serve
