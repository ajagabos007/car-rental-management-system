<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Car;

class CarForm extends Component
{

     /**
     * The hotel.
     *
     * @var \App\Models\Car
     */
    public $car;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($car=Null)
    {
        //
        $this->car =$car;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.car-form');
    }
}
