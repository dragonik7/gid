<?php

namespace App\Http\Service;

use App\Http\Dto\PlaceListDto;
use App\Models\Place;
use Illuminate\Database\Eloquent\Builder;

class PlaceService
{
    public function list(PlaceListDto $placeListDto)
    {
        $builder = Place::query()
            ->select(['id', 'name', 'info', 'geo', 'photo', 'price', 'category_id', 'created_at'])
            ->when(
                $placeListDto->name,
                function (Builder $builder) use ($placeListDto): void {
                $builder->where('name', 'ilike', "%$placeListDto->name%");
            })
            ->when(
                $placeListDto->category_id,
                function (Builder $builder) use ($placeListDto): void {
                    $builder->whereIn('category_id', json_decode($placeListDto->category_id));
                })
            ->when(
                $placeListDto->price_from,
                function (Builder $builder) use ($placeListDto): void {
                    $builder->when(
                        $placeListDto->price_to,
                        function (Builder $builder) use ($placeListDto): void {
                            $builder->whereBetween('price', [$placeListDto->price_from, $placeListDto->price_to]);
                        },
                        function (Builder $builder) use ($placeListDto): void {
                            $builder->where('price', '>=', $placeListDto->price_from);
                        }
                    );
                }
            );
        return $builder;
    }
}
