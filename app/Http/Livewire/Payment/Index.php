<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;
use App\Models\Payment;

class Index extends Component
{
    public function render()
    {
        return view('livewire.payment.index', ['payments'=>auth()->user()->payments()->orderBy('created_at', 'desc')->paginate(10)]);
    }
}
