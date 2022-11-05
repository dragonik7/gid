<?php

namespace App\Http\Requests\User;

use App\Http\Dto\UserRegistrationDto;
use App\Http\Requests\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public $dto = UserRegistrationDto::class;
    public function rules()
    {
        return [
            'full_name' => ['required', 'min:3', 'max:40', 'string'],
            'name' => ['required', 'min:3', 'max:40', 'string'],
            'email' => ['email', 'required', 'unique:users,email'],
            'phone_number' => ['string', 'max:25', 'nullable'],
            'avatar' => ['URL', 'size:16', 'nullable'],
            'password' => ['string', 'required', 'min:8', 'max:255'],
            'short_lang' => ['string', 'max:10', 'nullable'],
        ];
    }
}
