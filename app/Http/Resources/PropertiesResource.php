<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'description' => $this->description,
            'build_year' => $this->build_year,
            'listing_type' => $this->listing_type,
            'characteristics' => [
                new PropertyCharacteristicsResource($this->characteristics)
            ],
            'broker' => [
                new BrokersResource($this->broker),
            ]
        ];
    }
}
