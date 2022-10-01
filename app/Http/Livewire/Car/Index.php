<?php

namespace App\Http\Livewire\Car;

use Livewire\Component;
use App\Models\Car;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $data = ""; 
    
    public function render()
    { 
        return view('livewire.car.index', [
            'cars'=>Car::where('name', 'like', '%'.$this->data.'%')
            ->orWhere('price', 'like', '%'.$this->data.'%')
            ->orderBy('name', 'asc')->paginate(10)
        ]);
    }
   
    public function updatingSearch()

    {

        $this->resetPage();

    }
}
