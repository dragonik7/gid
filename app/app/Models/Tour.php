<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'tour_places', 'tour_id', 'place_id');
    }
    public function getPhotoAttribute($value)
    {
        $images = json_decode($value);
        foreach ($images as $key => $image) {
            $images[$key] = $_ENV['APP_URL'] . '/storage/' . $image;
        }
        return $images;
    }
}
