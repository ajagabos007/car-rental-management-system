<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
     }

    /**
     * Get the parent bookable model (bookings for flight, hostel, etc.).
     */
    public function bookable()
    {
        return $this->morphTo();
    }

    /**
     * Get the post's image.
     */
    public function payment()
    {
        return $this->morphOne(Payment::class, 'paymentable');
    }
   
}
