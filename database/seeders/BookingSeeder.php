<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        Booking::insert([
            [
                'userid' => 1,
                'carid' => 1,
                'startdate' => '2026-04-10',
                'enddate' => '2026-04-15',
                'totalcost' => 9000,
            ],
            [
                'userid' => 2,
                'carid' => 2,
                'startdate' => '2026-04-12',
                'enddate' => '2026-04-14',
                'totalcost' => 3200,
            ],
        ]);
    }
}
