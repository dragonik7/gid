<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class ErrorResource extends BaseApiResource
{
    public bool $success = false;
    public ?string $trace = null;
    private ?string $message = null;
    private ?array $errors = [];

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'message' => $this->message,
            'errors' => $this->errors,
        ];
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return ErrorResource
     */
    public function setMessage(?string $message): self {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getErrors(): ?array {
        return $this->errors;
    }

    /**
     * @param array|null $errors
     * @return ErrorResource
     */
    public function setErrors(?array $errors): self {
        $this->errors = $errors;
        return $this;
    }
}
