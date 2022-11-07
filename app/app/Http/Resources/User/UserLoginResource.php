<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseApiResource;
use App\Http\Resources\SuccessResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLoginResource extends SuccessResource
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
            'token' => $this->plainTextToken,
            'expiredAt'=>Carbon::parse($this->accessToken->expiredAt)->format('Y-m-d H:i:s')
        ];
    }
}
