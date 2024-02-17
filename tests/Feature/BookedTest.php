<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookedTest extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
//    public function test_seat_booked(): void
//    {
//        $reservationData = [
//            'seat_id'     => 10,
//            'station_from'   => 3,
//            'station_to'   => 4,
//        ];
//        $response = $this->postJson('/api/booked-seats', $reservationData);
//
//        $response->assertStatus(200);
//        $response->assertJson([
//            'message' => '',
//        ]);
//    }


    public function test_seat_miss_station_to_data_station_booked(): void
    {
        $reservationData = [
            'seat_id'     => 2,
            'station_from'   => 1,
        ];
        $response = $this->postJson('/api/booked-seats', $reservationData);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors("station_to");
    }


    public function test_seat_miss_station_from_data_station_booked(): void
    {
        $reservationData = [
            'seat_id'     => 2,
            'station_to'   => 1,
        ];
        $response = $this->postJson('/api/booked-seats', $reservationData);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors("station_from");
    }


    public function test_seat_miss_station_from_gt_to_data_station_booked(): void
    {
        $reservationData = [
            'seat_id'     => 4,
            'station_to'   => 3,
            'station_from'   => 5,
        ];
        $response = $this->postJson('/api/booked-seats', $reservationData);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors("station_to");
    }


    public function test_seat_out_of_one_to_12_data_station_booked(): void
    {
        $reservationData = [
            'seat_id'     => 114,
            'station_from'   => 2,
            'station_to'   => 3,
        ];
        $response = $this->postJson('/api/booked-seats', $reservationData);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors("seat_id");
    }
}
