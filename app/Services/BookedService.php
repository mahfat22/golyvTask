<?php
namespace App\Services;
use App\Models\BookedSeat;
use App\Traits\CheckSeatTrait;

class BookedService
{
    use CheckSeatTrait;
    protected $model;
    public function __construct()
    {
        $this->model = new BookedSeat();
    }

    public function store($data)
    {
        return $this->model->create($data);
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
}

