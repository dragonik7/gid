<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseApiResource extends JsonResource
{
    public function __construct($resource = null)
    {
        parent::__construct($resource);
    }
    public bool $success = false;

    public function with($request)
    {
        return [
            'status' => $this->success,
        ];
    }
    public function setStatusCode(int $statusCode): JsonResponse
    {
        return $this->response()->setStatusCode($statusCode);
    }
}
