<?php

namespace App\Http\Service;

use App\Http\Dto\TourListDto;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Builder;

class TourService
{
    public function list(TourListDto $tourListDto)
    {
        $builder = Tour::query()
            ->select(['id', 'name', 'info', 'price', 'photo', 'data_start', 'duration', 'category_id', 'category_id'])
            ->when(
                $tourListDto->name,
                function (Builder $builder) use ($tourListDto): void {
                $builder->where('name', 'ilike', "%$tourListDto->name%");
            })
            ->when(
                $tourListDto->category_id,
                function (Builder $builder) use ($tourListDto): void {
                    $builder->whereIn('category_id', json_decode($tourListDto->category_id));
                })
            ->when(
                $tourListDto->price_from,
                function (Builder $builder) use ($tourListDto): void {
                    $builder->when(
                        $tourListDto->price_to,
                        function (Builder $builder) use ($tourListDto): void {
                            $builder->whereBetween('price', [$tourListDto->price_from, $tourListDto->price_to]);
                        },
                        function (Builder $builder) use ($tourListDto): void {
                            $builder->where('price', '>=', $tourListDto->price_from);
                        }
                    );
                }
            );
        return $builder;
    }
}
