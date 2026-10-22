<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'carid' => $this->carid,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'description' => $this->description,
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'fuel_type' => $this->fuel_type,
            'seats' => $this->seats,
            'transmission' => $this->transmission,
            'air_conditioning' => $this->air_conditioning,
            'availability' => $this->availability,
        ];
    }
}
