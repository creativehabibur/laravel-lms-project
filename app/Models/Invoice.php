<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function amount(){
        $amouts = [
            'amount' => 0,
            'paid' => 0,
            'due' => 0,
        ];

        foreach ($this->invoiceItems as $item) {
            $amouts['amount'] += $item->price * $item->quantity;
        }

        foreach ($this->payments as $payment) {
            $amouts['paid'] += $payment->amount;
        }

        $amouts['due'] += $amouts['amount'] - $amouts['paid'];

        return $amouts;
    }
}
