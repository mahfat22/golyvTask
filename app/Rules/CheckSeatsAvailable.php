<?php

namespace App\Rules;

use App\Traits\CheckSeatTrait;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckSeatsAvailable implements ValidationRule
{
    use CheckSeatTrait;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $station_from;
    protected $station_to;

    public function __construct( $station_from , $station_to )
    {
        $this->station_from = $station_from;
        $this->station_to = $station_to;
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
