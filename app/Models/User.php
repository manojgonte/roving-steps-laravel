<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'contact', 'contact_alt', 'address', 'dob',
        'anniversary_date', 'passport_no', 'visa_type', 'visa_expiry',
        'pan_no', 'aadhar_no', 'passport_expiry', 'gst_no', 'gst_address',
        'created_at', 'password', 'pan_card_file', 'aadhar_card_file', 
        'passport_file', 'status', 'created_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function planned_tours() {
        return $this->hasMany(PlannedTour::class, 'customer_name');
    }
}
