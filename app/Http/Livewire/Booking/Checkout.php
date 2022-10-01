<?php

namespace App\Http\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;

class Checkout extends Component
{
    public Booking $booking;

    public function render()
    {
        return view('livewire.booking.checkout');
    }
}
