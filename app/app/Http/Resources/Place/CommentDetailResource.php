<?php

namespace App\Http\Resources\Place;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\User\UserInfoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentDetailResource extends SuccessResource
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
            'text' => $this->text,
            'image' => $this->image,
            'rating' => $this->rating,
            'user' => UserInfoResource::make($this->users)
        ];
    }
}
