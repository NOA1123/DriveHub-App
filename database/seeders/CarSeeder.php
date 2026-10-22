<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::insert([
            [
                'name' => 'Toyota Corolla',
                'image' => 'toyota_corolla.jpg',
                'price' => 1800,
                'description' => 'Comfortable family sedan suitable for everyday use.',
                'make' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2022,
                'fuel_type' => 'Petrol',
                'seats' => 5,
                'transmission' => 'Automatic',
                'air_conditioning' => 'Yes',
                'availability' => 'True',
            ],
            [
                'name' => 'Honda Fit',
                'image' => 'honda_fit.jpg',
                'price' => 1600,
                'description' => 'Compact and fuel efficient car.',
                'make' => 'Honda',
                'model' => 'Fit',
                'year' => 2021,
                'fuel_type' => 'Petrol',
                'seats' => 5,
                'transmission' => 'Automatic',
                'air_conditioning' => 'Yes',
                'availability' => 'True',
            ],
            [
                'name' => 'Nissan X-Trail',
                'image' => 'nissan_xtrail.jpg',
                'price' => 2800,
                'description' => 'Spacious SUV ideal for family trips.',
                'make' => 'Nissan',
                'model' => 'X-Trail',
                'year' => 2023,
                'fuel_type' => 'Diesel',
                'seats' => 7,
                'transmission' => 'Automatic',
                'air_conditioning' => 'Yes',
                'availability' => 'True',
            ],
        ]);
    }
}