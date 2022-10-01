<?php

namespace App\Http\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Car;

class Index extends Component
{
    public $flights_bookings = [];
    public $booking;
    public $tabs = [
        'car-bookings' => true,
        'hotel-bookings' => false,
        'flight-bookings' => false,
    ];
    public function render()
    {
        return view('livewire.booking.index',
        [
            'flight_bookings' => Booking::orderBy('created_at','desc')->where('bookable_type','=',Flight::class)->where('user_id', '=', auth()->user()->id)->get(),
            'hotel_bookings' => Booking::orderBy('created_at','desc')->where('bookable_type','=',Hotel::class)->where('user_id', '=', auth()->user()->id)->get(),
            'car_bookings' => Booking::orderBy('created_at','desc')->where('bookable_type','=',Car::class)->where('user_id', '=', auth()->user()->id)->get(),
        ]
        );
    }

    public function delete(Booking $booking, $tab){
        $booking->delete();
        
        // hide all tabs 
        foreach($this->tabs as $key => $value) {
            $this->tabs[$key] = false;
        }
        // show current tab
        $this->tabs[$tab] = true;
        
        $this->dispatchBrowserEvent('success', ['message' => "Booking delete successfully"]);
    }
}
