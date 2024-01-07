<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlannedTour extends Model
{
    use HasFactory;

    protected $table = 'planned_tour';

    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
