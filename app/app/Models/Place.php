<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo(PlaceCategory::class, 'category_id');
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_places', 'place_id', 'tour_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPhotoAttribute($value)
    {
        $images = json_decode($value);
        foreach ($images as $key => $image) {
            $images[$key] = $_ENV['APP_URL'] . '/storage/' . $image;
        }
        return $images;
    }

    public function getGeoAttribute($value)
    {
        return json_decode($value);
    }
}
