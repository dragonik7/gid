<?php

namespace App\Http\Controllers;

use App\Http\Dto\PlaceListDto;
use App\Http\Requests\Place\PlaceListRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\Place\PlaceDetailResource;
use App\Http\Resources\Place\PlaceListResource;
use App\Http\Service\PlaceService;
use App\Models\Place;
use App\Models\PlaceCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceController extends Controller
{
    public function listCategory(){
        $categories = PlaceCategory::all();
        return CategoryResource::collection($categories)->response()->setStatusCode(200);
    }
    public function list(PlaceListRequest $request, PlaceService $placeService){
        /** @var PlaceListDto $placeDto */
        $placeDto = $request->getStructure();
        $place = $placeService->list($placeDto)->get();
        return PlaceListResource::collection($place)->response()->setStatusCode(200);
    }
    public function detail(Place $place){
        return PlaceDetailResource::make($place)->response()->setStatusCode(200);
    }
}
