<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserBooking extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
          'id' => $this->id,
          'seat_number' => $this->seat_number,
          'price' => $this->price,
          'status' => $this->status,
          'bus_seat_id' => $this->bus_seat_id,
          'user_id' => $this->user_id,
          'bus_schedule_id' => $this->bus_schedule_id,
        ];
    }
}
