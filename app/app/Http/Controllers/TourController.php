<?php

namespace App\Http\Controllers;

use App\Http\Dto\TourListDto;
use App\Http\Requests\Place\TourListRequest;
use App\Http\Service\TourService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function list(TourListRequest $request, TourService $tourService){
        /** @var TourListDto $tourListDto */
        $tourListDto = $request->getStructure();
        $tour = $tourService->list($tourListDto)->get();
        return PlaceListResource::collection($tour)->response()->setStatusCode(200);
    }
}
