<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numbers = range(1, 12);
        foreach ($numbers as $number) {
            Seat::create([
                'number' => $number,
            ]);
        }
    }
}
