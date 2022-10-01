<?php

namespace App\Http\Livewire\Car;

use Livewire\Component;
use App\Models\Car;

class Show extends Component
{
    public Car $car;
    public function render()
    {
        return view('livewire.car.show');
    }
}
