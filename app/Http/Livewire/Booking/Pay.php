<?php

namespace App\Http\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Payment;
use App\Http\Generators\PaymentGenerator;


class Pay extends Component
{
    public Booking $booking;
    public $user = [];

    public function render()
    {
        return view('livewire.booking.pay');
    }

    public function mount(){
        $this->user = [
            'name' => $this->booking->user->name,
            'email' => $this->booking->user->email,
            'phone_number' => $this->booking->user->phone_number,
        ];
    }

    public function proceedToPay(){

        if($this->booking->payment) 
        return redirect()->route('payments.show', $this->booking->payment);

        $payment = new Payment();
        $generator = new PaymentGenerator;
        $payment->transaction_reference = $generator->generatePaymentTransactionReference();
        $payment->paymentable_id = $this->booking->id;
        $payment->paymentable_type = Booking::class;
        $payment->paymentable_url = route('bookings.show',$this->booking->id);

        $payment->for = "Flight Booking";
        $payment->amount = $this->booking->amount;

        $payment->save();
       return redirect()->route('payments.show', $payment);
    }
}
