<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookedSeatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'station_from'  => $this->station_from ,
            'station_to'    => $this->station_to ,
            'seat_id'       => $this->seat_id ,
        ];
    }
}
