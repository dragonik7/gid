<?php

namespace App\Http\Resources\Tour;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TourDetailResource extends SuccessResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'info' => $this->info,
            'price' => $this->price,
            'photos' => $this->photo,
            'date_start' => $this->date_start,
            'duration' => $this->duration,
            'places' => TourPlacesResource::collection($this->places),
            'categories' => new CategoryResource($this->categories)
        ];
    }
}
