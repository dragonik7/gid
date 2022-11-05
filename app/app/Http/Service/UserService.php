<?php

namespace App\Http\Service;

use App\Http\Dto\UserRegistrationDto;
use App\Models\User;
use RuntimeException;

class UserService
{
    public function register(UserRegistrationDto $registerUserDto)
    {
        $existsUser = User::withTrashed()->where('email', $registerUserDto->email)->first();

        if ($existsUser !== null && $existsUser->isDeleted()) {
            throw new RuntimeException('Account deleted or don`t exist');
        }
        return User::firstOrCreate($registerUserDto->toArray());
    }
}
