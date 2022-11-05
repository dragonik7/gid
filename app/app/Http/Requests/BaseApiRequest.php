<?php

namespace App\Http\Requests;

use App\Http\Resources\ErrorResource;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\DataTransferObject;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property DataTransferObject $dto
 */
class BaseApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function failedValidation(Validator $validator): array
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            ErrorResource::make()
                ->setMessage('VALIDATION_ERROR')
                ->setErrors($errors)
                ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    public function getStructure(): DataTransferObject
    {
        return new $this->dto($this->all());
    }
}
