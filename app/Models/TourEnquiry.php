<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourEnquiry extends Model
{
    use HasFactory;

    protected $table = 'tour_enquiry';

    protected $casts = [
        'services' => 'array'
    ];

    protected $fillable = [
        'tour_id',
        'user_id',
        'services',
        'prefix',
        'name',
        'contact',
        'email',
        'destination',
        'tourist_no',
        'from_date',
        'end_date',
        'current_city',
        'message'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'name');
    }

    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
