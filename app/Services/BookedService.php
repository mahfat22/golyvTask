<?php
namespace App\Services;
use App\Models\BookedSeat;
use App\Models\Seat;

class BookedService
{
    protected $model;
    public function __construct()
    {
        $this->model = new BookedSeat();
    }

    public function store($data)
    {
        $this->model->create($data);
    }

    public function getAvailableSeats($data)
    {
        $occupiedSeats = $this->getOccupiedSeats($data);
        return $this->filterOutNumbers($occupiedSeats) ;
    }

    private function filterOutNumbers($emptyChairs)
    {
        $numbers = range(1, 12);
        $mergedArray = array_merge($emptyChairs, $numbers);
        $occurrences = array_count_values($mergedArray);
        $notRepeatedNumbers = array_filter($occurrences, function($value) {
            return $value === 1;
        });
        return array_keys($notRepeatedNumbers) ;
    }

    private function getOccupiedSeats($data)
    {
        $startStation = $data['station_from'] ;
        $endStation=  $data['station_to'];

        $occupiedSeats = Seat::join('booked_seats', function ( $query ) use ($startStation , $endStation )  {
            $query->on('seats.id', 'booked_seats.seat_id') ;
        })
            ->where(function ($query1) use ($startStation, $endStation) {
                $query1->where("booked_seats.station_from","<",$startStation)
                    ->where("station_to",">",$endStation);
            })
            ->orWhere(function ($query) use ($startStation, $endStation) {
                $query->where("booked_seats.station_from",">=",$startStation)
                    ->where("booked_seats.station_to","<=",$endStation) ;
            })
            ->orWhere(function ($query3) use ($startStation, $endStation) {
                $query3->whereBetween("booked_seats.station_from",[ $startStation, $endStation-1 ])
                    ->where("booked_seats.station_to",">",$endStation) ;
            })
            ->orWhere(function ($query4) use ($startStation, $endStation) {
                $query4->where("booked_seats.station_from", "<",  $startStation)
                    ->whereBetween("booked_seats.station_to",[ $startStation+1, $endStation ])
                ;
            })
            ->selectRaw('seats.number as chair_number , seats.id as seat_id , booked_seats.id as reserve_chair_id , station_from , station_to')
            ->pluck('chair_number')
            ->toArray();

        return $occupiedSeats ;
    }
}

