<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'postalCode' => $this->postal_code,
            'city' => $this->city,
            'description' => $this->description,
            'mixedGender' => $this->mixed_gender,
            'petsAllowed' => $this->pets_allowed,
            'squareMeters' => $this->square_meters,
            'numOfRooms' => $this->num_of_rooms,
            'seekingRoomie' => $this->seeking_roomie,
            'seekingUpdatedAt' => $this->seeking_updated_at
        ];
    }
}
