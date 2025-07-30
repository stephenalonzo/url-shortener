# SimpleURL (URL Shortener)
SimpleURL allows users to instantly shorten long URLs into clean, shareable links. Whether for personal use or business marketing, our tool ensures fast, reliable, and secure link shortening.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Clone

* In your terminal, type in ```cd /your/desired/path``` to enter the directory you would like to clone the repository
* Then run ```git clone https://github.com/stephenalonzo/easyride-rental.git```

Voila! You have successfully cloned this project.

### Prerequisites

The things you need before installing the software.

* Composer
* Node.js (npm) version: 20.x
* PHP version: 8.x
* Laravel version: 10.x
* MySQL version：8.0.x / MariaDB version：10.3.x

### Installation

A step by step guide that will tell you how to get the development environment up and running.

```
copy .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh –seed
npm install
npm run build
```

## Usage

Development

```
php artisan serve
npm run dev
```

Clear & Cache

```optimize``` will cache & clear config and route files

```
php artisan optimize:clear
```

MySQL env variables
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=simpleurl
DB_USERNAME=root
DB_PASSWORD=
```
