<?php

namespace App\Http\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;

class Show extends Component
{
    public Booking $booking;
    public $user = [];
    
    public function render()
    {
        return view('livewire.booking.show');
    }
    public function mount(){
        $this->user = [
            'name' => $this->booking->user->name,
            'email' => $this->booking->user->email,
            'phone_number' => $this->booking->user->phone_number,
        ];
    }
}
