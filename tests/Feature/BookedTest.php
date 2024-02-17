<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookedTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_seat_booked(): void
    {
        $reservationData = [
            'seat_id'     => 10,
            'station_from'   => 3,
            'station_to'   => 4,
        ];
        $response = $this->postJson('/api/booked-seats', $reservationData);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => '',
        ]);
    }
}
