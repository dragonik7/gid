<?php

namespace App\Http\Service;

use App\Http\Dto\UserRegistrationDto;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\ErrorResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

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

    public function login(UserLoginRequest $request)
    {
        $user = User::query()->where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            throw new HttpResponseException(
                ErrorResource::make()
                    ->setMessage('Пользователя не существует или пароль введен некорректно')
                    ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)
            );
        }
        $user->tokens()->delete();

        return $user->createToken(
            name: $request->input('email'),
            expiresAt: Carbon::parse(
                Carbon::now()->addMonth()
            )
        );
    }
}
