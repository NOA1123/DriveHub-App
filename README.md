<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# DriveHub REST API (Laravel)

## Overview

DriveHub is a RESTful API developed using Laravel for managing a car rental system.

The API allows users to:

- manage cars
- create and manage bookings
- manage users
- book car

All data is handled through JSON responses.

---

## Technologies

- Laravel (PHP 8.4)
- MySQL
- REST API
- JSON

---

## Setup

### 1. Create Database

Create a database in phpMyAdmin:

DriveHub

---

### 2. Change '.env' file

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=DriveHub
DB_USERNAME=root
DB_PASSWORD=

---

### 3. Run Project

php artisan config:clear
php artisan migrate
php artisan db:seed
php artisan serve

API BASE URL: http://127.0.0.1:8000/api

---

## API Endpoints

### Cars

- GET `/api/cars`
- GET `/api/cars/{id}`
- POST `/api/cars`
- PUT `/api/cars/{id}`
- DELETE `/api/cars/{id}`

### Bookings

- GET `/api/bookings`
- GET `/api/bookings/{id}`
- POST `/api/bookings`
- PUT `/api/bookings/{id}`
- DELETE `/api/bookings/{id}`

### Users

- GET `/api/users`
- GET `/api/users/{id}`
- POST `/api/users`
- PUT `/api/users/{id}`
- DELETE `/api/users/{id}`

---

## Booking Logic

- Total cost is automatically calculated:
  totalcost = car_price x Number_of_Days

- Car availability:
- Booking created → availability = False
- Booking deleted → availability = True

---

## Example API Usage

### Booking a Car

### Scenario

A user wants to rent a car from the system. The client sends a booking request to the API, which calculates the cost and stores the booking.

**Request**
POST /api/bookings

```json
{
  "userid": 1,
  "carid": 1,
  "startdate": "2026-04-20",
  "enddate": "2026-04-25"
}

**Response**
{
    "message": "Booking created successfully",
    "total_days": 5,
    "data": {
        "bookingid": 4,
        "userid": 1,
        "carid": 1,
        "startdate": "2026-04-20",
        "enddate": "2026-04-25",
        "totalcost": 9000,
        "car": {
            "carid": 1,
            "name": "Toyota Corolla",
            "image": "toyota_corolla.jpg",
            "price": 1800,
            "description": "Comfortable family sedan suitable for everyday use.",
            "make": "Toyota",
            "model": "Corolla",
            "year": 2022,
            "fuel_type": "Petrol",
            "seats": 5,
            "transmission": "Automatic",
            "air_conditioning": "Yes",
            "availability": "False"
        },
        "user": {
            "userid": 1,
            "username": "naresh",
            "phone": "59221427",
            "email": "naresh@example.com",
            "user_type": "Admin"
        }
    }
}

##Testing

The API can be tested using:
Postman
cURL
browser for GET requests
simple frontend demo page(GET/ADD/DELETE/UPDATE FOR CARS/USERS/BOOKINGS)


```
