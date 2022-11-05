<?php

namespace App\Http\Controllers;

use App\Http\Dto\UserRegistrationDto;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Resources\User\UserRegisterResource;
use App\Http\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param UserRegisterRequest $request
     * @param UserService $serviceRegister
     * @return JsonResponse
     */
    public function register(UserRegisterRequest $request, UserService $serviceRegister)
    {
        /** @var UserRegistrationDto $structure */
        $structure = $request->getStructure();
        $userRegister = $serviceRegister->register($structure);
        return UserRegisterResource::make($userRegister)->setStatusCode(201);
    }

    public function login()
    {

    }
}
