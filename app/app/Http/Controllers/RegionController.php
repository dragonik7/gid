<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\Region\RegionListResource;
use App\Models\Region;
use App\Models\RegionCategory;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function listCategory(){
        $categories = RegionCategory::all();
        return CategoryResource::collection($categories)->response()->setStatusCode(200);
    }
    public function list(){
        $regions = Region::all();
        return RegionListResource::collection($regions)->response()->setStatusCode(200);
    }
}
