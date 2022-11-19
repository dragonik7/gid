<?php

namespace App\Http\Resources\User;

use App\Http\Resources\SuccessResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends SuccessResource
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
            'name' => $this->name,
            'avatar' => $this->avatar
        ];
    }
}
