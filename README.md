# Documentation

# Installation and setup

## Prerequisites
- copy .env.example content into a new file .env
- create an empty file in database folder, database.sqlite

## linux or MacOs machine
- project can be run using sail which is supported in MacOs and Linux. follow the steps
- Install sail in your machine https://laravel.com/docs/10.x/installation#docker-installation-using-sail this is a prerequisite

### Running project
- From your cmd line run the following commands from the root of the project:
    - ./vendor/bin/sail build
- From other cmd line window run: ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
- From other cmd line window run: ./vendor/bin/sail up
- From other cmd line window run: ./vendor/bin/sail artisan migrate && ./vendor/bin/sail artisan db:seed

## Windows machine
- Install PHP version 8.2 and enable following extensions: fileinfo, sqlite3, 
- in php.ini make sure latest curl certificate https://matomo.org/faq/troubleshooting/what-to-do-when-you-see-curl-60-ssl-certificate-problem-unable-to-get-local-issuer-certificate-error/#:~:text=Error%20%E2%80%9Ccurl%3A%20(60),se%2Fca%2Fcacert.pem
-  Install git, npm and composer and their corresponding dependencies.

### Running project
From your cmd lines in the root folder run the following commands:
    - composer install
    - npm install
    - php artisan migrate
    - php artisan db:seed
- from two different cmd lines run php artisan serve and npm run dev
- application will be running in localhost:8000

## Default users
Default users will show in users tables with their email and passwords [['john@example.com','02012024@@'], ['julius@example.com','02012023@@'], ['olijide@example.com','02012022@@']] or combinations of those name.
- users also will contain records for favorite quotes in user_favorite_quotes table

----
# Features

1.	Requirement: Code Repository [implemented]

2.	Requirement: Datastore [implemented]

3.	Feature: Datastore Initialization [implemented]

4.	Feature: Cache [implemented]

5.	Feature: Web/API Authentication [implemented] [tested]

6.	Feature: Web Registration for Users [implemented] [tested]

7.	Feature: Quote of the Day [implemented] [tested]

8.	Feature: Five Random Quotes [implemented] [tested]

9.	Feature: Ten Secure Quotes [implemented] [tested]

10.	Feature: Favorite Quotes [implemented] [tested]

11.	Feature: Report of Favorite Quotes [implemented] [tested]

12.	Feature: REST API for Five Random Quotes [implemented] [tested]

13.	Feature: REST API for Ten Secure Quotes [implemented] [tested]

14.	Feature: Online API Test [implemented] [tested] *
* Secure quote api endpoints no working for testing. Added a postman collection to be verify. Just need update in variables 

15.	Feature: Console/Shell Command for Five Random Quotes [implemented] [tested]

16.	Feature: PHP Automated Testing [implemented]

Amount of time: 16hrs development and testing 