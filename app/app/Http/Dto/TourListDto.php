<?php

namespace App\Http\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class TourListDto extends DataTransferObject
{
    public ?string $name;
    public ?string $category_id;
    public ?int $price_from;
    public ?int $price_to;
    public ?string $date_from;
}
