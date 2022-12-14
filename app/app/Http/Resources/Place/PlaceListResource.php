<?php

namespace App\Http\Resources\Place;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceListResource extends SuccessResource
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
            'geo' => $this->geo,
            'categories' => new CategoryResource($this->categories)
        ];
    }
}
