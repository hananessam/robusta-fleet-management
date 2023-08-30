<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'city_from' => $this->city_from?->name,
            'city_to' => $this->city_to?->name,
            'datetime_from' => $this->datetime_from,
            'datetime_to' => $this->datetime_to,
        ];
    }
}
