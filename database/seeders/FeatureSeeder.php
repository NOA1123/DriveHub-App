<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        Feature::insert([
            ['carid' => 1, 'feature' => 'Bluetooth'],
            ['carid' => 1, 'feature' => 'Reverse Camera'],
            ['carid' => 2, 'feature' => 'USB Charging'],
            ['carid' => 2, 'feature' => 'Parking Sensors'],
            ['carid' => 3, 'feature' => 'GPS Navigation'],
            ['carid' => 3, 'feature' => 'Leather Seats'],
        ]);
    }
}
