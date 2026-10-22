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
