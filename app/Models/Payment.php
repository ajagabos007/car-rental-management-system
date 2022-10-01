<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    /**
     * Get the parent paymentable model (bookings for flight, hostel, etc.).
     */
    public function paymentable()
    {
        return $this->morphTo();
    }
}
