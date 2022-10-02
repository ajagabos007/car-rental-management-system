<?php

namespace App\Http\Livewire\Car;

use Livewire\Component;
use App\Models\Car;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $data = ""; 
 
    public $min_price = 0 ;
    public $max_price;
    public $slider_min_price;
    public $slider_max_price;

    
    public function mount(){
        $this->max_price = Car::max('price');
        $this->slider_min_price = Car::min('price');;
        $this->slider_max_price = $this->max_price;
    }
    public function render()
    { 
        return view('livewire.car.index', [
            'cars'=>Car::where('name', 'like', '%'.$this->data.'%')
            ->where('price', '>=', $this->min_price)
            ->Where('price', '<=', $this->max_price)
            ->orderBy('name', 'asc')->paginate(10)
        ]);
    }
    public function updatingSearch(){
        $this->resetPage();
    }
}
