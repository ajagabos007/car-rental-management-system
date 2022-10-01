<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;
use App\Models\Payment;

class FlutterwaveCheckout extends Component
{
    public Payment $payment;
    public $text = null;
    public function render()
    {
        return view('livewire.payment.flutterwave-checkout');
    }
}
