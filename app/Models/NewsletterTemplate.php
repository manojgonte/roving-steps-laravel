<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterTemplate extends Model
{
    use HasFactory;

    protected $table = 'newsletter_templates';

    protected $fillable = [
        'name',
        'subject',
        'body',
    ];
}
