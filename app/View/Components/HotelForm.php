<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HotelForm extends Component
{
     /**
     * The hotel.
     *
     * @var \App\Models\Hotel
     */
    public $hotel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($hotel=Null)
    {
        //
        $this->hotel =$hotel;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hotel-form');
    }
}
