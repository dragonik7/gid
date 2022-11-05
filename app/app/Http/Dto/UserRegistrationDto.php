<?php

namespace App\Http\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class UserRegistrationDto extends DataTransferObject
{
    public string $full_name;
    public string $name;
    public string $email;
    public ?string $phone_number = null;
    public ?object $avatar = null;
    public string $password;
    public string $short_lang = 'ru';
}
