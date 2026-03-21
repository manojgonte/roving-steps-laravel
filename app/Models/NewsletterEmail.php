<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsletterEmail extends Model
{
    use HasFactory;

    protected $table = 'newsletters_emails';

    protected $fillable = [
        'email',
        'status',
        'unsubscribe_token',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->unsubscribe_token)) {
                $model->unsubscribe_token = Str::random(32);
            }
        });
    }
}
