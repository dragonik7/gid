<?php

namespace App\Http\Controllers;

use App\Http\Dto\TourListDto;
use App\Http\Requests\Tour\TourListRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\Tour\TourDetailResource;
use App\Http\Resources\Tour\TourListResource;
use App\Http\Service\TourService;
use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function listCategory(){
        $categories = TourCategory::all();
        return CategoryResource::collection($categories)->response()->setStatusCode(200);
    }
    public function list(TourListRequest $request, TourService $tourService){
        /** @var TourListDto $tourListDto */
        $tourListDto = $request->getStructure();
        $tour = $tourService->list($tourListDto)->get();
        return TourListResource::collection($tour)->response()->setStatusCode(200);
    }
    public function detail(Tour $tour){
        return TourDetailResource::make($tour)->response()->setStatusCode(200);
    }
}
