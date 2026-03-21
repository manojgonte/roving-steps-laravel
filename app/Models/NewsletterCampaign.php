<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterCampaign extends Model
{
    use HasFactory;

    protected $table = 'newsletter_campaigns';

    protected $fillable = [
        'name',
        'subject',
        'body',
        'recipient_type',
        'total_recipients',
        'sent_count',
        'failed_count',
        'status',
    ];
}
