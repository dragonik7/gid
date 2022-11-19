<?php

namespace App\Http\Requests\Tour;

use App\Http\Dto\TourListDto;
use App\Http\Requests\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class TourListRequest extends BaseApiRequest
{
    public $dto = TourListDto::class;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255', 'nullable'],
            'category_id' =>['max:255', 'string', 'nullable'],
            'price_from' => ['integer', 'nullable'],
            'price_to' => ['integer', 'nullable'],
            'date_from' => ['string', 'nullable', 'max:255']
        ];
    }
}
