<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'bookingid' => $this->bookingid,
            'userid' => $this->userid,
            'carid' => $this->carid,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'totalcost' => $this->totalcost,
            'car' => new CarResource($this->whenLoaded('car')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
