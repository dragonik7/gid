<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseApiResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRegisterResource extends SuccessResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'created'
        ];
    }
}
