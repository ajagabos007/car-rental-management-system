<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;

use App\Models\Payment;

class Show extends Component
{
    public Payment $payment;
    public $user = [
        'name' => 'Philip James',
        'email' => 'ajagabos007@gmail.com',
        'phone_number' => '08030408642'
    ];

    public function render()
    {
        return view('livewire.payment.show');
    }

}
