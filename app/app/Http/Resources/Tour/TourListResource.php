<?php

namespace App\Http\Resources\Tour;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TourListResource extends SuccessResource
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
            'price' => $this->price,
            'photos' => $this->photo,
            'duration' => $this->duration,
            'categories' => new CategoryResource($this->categories)
        ];
    }
}
