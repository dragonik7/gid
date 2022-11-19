<?php

namespace App\Http\Requests\Place;

use App\Http\Dto\PlaceListDto;
use App\Http\Requests\BaseApiRequest;

class PlaceListRequest extends BaseApiRequest
{
    public $dto = PlaceListDto::class;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255', 'nullable'],
            'category_id' => ['max:255', 'string', 'nullable'],
            'price_from' => ['integer', 'nullable'],
            'price_to' => ['integer', 'nullable']
        ];
    }
}
