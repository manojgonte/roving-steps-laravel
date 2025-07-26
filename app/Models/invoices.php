<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $casts = [
        'invoice_for' => 'array'
    ];

    public function customer() {
        return $this->belongsTo(User::class, 'bill_to');
    }

    public function invoicePayments() {
        return $this->hasMany(payments::class, 'invoice_id');
    }

    public function invoiceItems() {
        return $this->hasMany(InvoiceItems::class, 'invoice_id');
    }
}
