<?php

namespace App\Rules;

use App\Traits\CheckSeatTrait;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckSeatsAvailable implements ValidationRule
{
    use CheckSeatTrait;

    protected $station_from;
    protected $station_to;

    public function __construct()
    {
        $this->station_from = request()->station_from ?? 1;
        $this->station_to = request()->station_to ?? 1;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $data = ["station_from" =>$this->station_from , "station_to" => $this->station_to];
        $occupiedSeats = $this->getOccupiedSeats($data) ;
        if ( in_array( $value , $occupiedSeats ) ){
            $fail('The Seat Is Not valid');
        }
    }
}
