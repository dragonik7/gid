<?php

namespace App\Http\Controllers;

use App\Http\Dto\PlaceListDto;
use App\Http\Requests\Place\PlaceListRequest;
use App\Http\Resources\Place\PlaceListResource;
use App\Http\Service\PlaceService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceController extends Controller
{
    public function list(PlaceListRequest $request, PlaceService $placeService){
        /** @var PlaceListDto $placeDto */
        $placeDto = $request->getStructure();
        $place = $placeService->list($placeDto)->get();
        return PlaceListResource::collection($place)->response()->setStatusCode(200);
    }
}
