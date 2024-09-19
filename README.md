## About the Application

Currency Exchange API is a reliable tool for obtaining up-to-date exchange rates from the Central Bank. We provide a simple and convenient way to access exchange rate data, which is updated daily. Our API ensures fast and secure access to this information, allowing your application to integrate it with ease.

- [REST API Documentation](http://api.exchange-rate.test/documentation).

## Configuration

The environment file (.env) of the project contains all the settings necessary for its operation, including database configuration, project information (name, URL), email parameters, and Redis. To set the values of these settings, you need to make the appropriate changes to this file.

## Installation

```
    docker-compose build
```

```
    docker-compose up -d
```

In a local environment:

```
    cp .env.local .env
```


In a production environment:

```
    cp .env.prod.example .env
```

To set up the project in your container, run the following commands to automate all necessary processes:

```
    composer install
```

```
    php artisan app:init
```
## This Command Includes:
- **[Installing Composer Packages](https://laravel.com/docs/4.2#install-composer)**
- **[Generating a Project Key.](https://laravel.com/docs/7.x/installation#configuration)**
- **[Running Database Migrations.](https://laravel.com/docs/9.x/migrations#running-migrations)**
- **[Seeding the Database with Default Values.](https://laravel.com/docs/9.x/seeding#running-seeders)**
- **Optimization.**
- **Copying the example environment file to the environment file.**
- **[Generating Swagger Documentation.](https://swagger.io/)**

## Repository Overview

Here’s an overview of the directory and file structure:

```
├── app
├── bootstrap
├── config
│   ├── admin.php
│   ├── app.php
│   ├── auth.php
│   ├── backup.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── cors.php
│   ├── database.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── l5-swagger.php
│   └── logging.php
│   └── mail.php
│   └── queue.php
│   └── sanctum.php
│   └── services.php
│   └── session.php
│   └── translation-manager.php
│   └── view.php
├── database
│   └── factories
│   └── migrations
│   └── seeders
├── public
├── resources
├── routes
├── storage
└── tests
├── .env.example
├── .gitignore
├── composer.json
├── composer.loc
├── data-preparation
├── README.md
└── phpunit.xml
```

## Configuration

The project includes an environment file (.env) that provides access to the project settings. These settings include database configuration, project data (name, URL), email settings, and Redis. To set the configuration values, edit this file.

## About Me

- **Contacts**
    - ***[LinkedIn](https://www.linkedin.com/in/karbagh/)***
    - ***[hh](https://hh.ru/resume/edbb565aff0b5cc6070039ed1f376c654d6c6e)***
- **Phone**
    - ***+ (374) 99 93 44 49***
- **Email**
    - ***[karenbaghdasaryan598@gmail.com](mailto:karenbaghdasaryan598@gmail.com)***
