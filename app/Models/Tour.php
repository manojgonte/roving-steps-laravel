<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $casts = [
        'special_tour_type' => 'array'
    ];

    public function itinerary(){
        return $this->hasMany(TourItinerary::class, 'tour_id');
    }

    public function destination(){
        return $this->belongsTo(Destination::class, 'dest_id');
    }
}
