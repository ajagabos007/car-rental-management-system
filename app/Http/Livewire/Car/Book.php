<?php

namespace App\Http\Livewire\Car;

use Livewire\Component;
use App\Models\Car as CarModel;

use App\Models\Booking;
use App\Models\MassSaver;
use App\Models\User;
use App\Models\Payment;
use App\Http\Generators\PaymentGenerator;


use App\Http\Generators\BookingGenerator;

use Illuminate\Support\Facades\Auth;


class Book extends Component
{
    public CarModel $car;
    public $booking;
    public $user;

    protected $listeners = ['carBookingConfirmed'=>'$refresh'];
    public function mount(){
        if(Auth::user())
            $this->user = Auth::user();
        $this->booking = new Booking;
    }
    public function render()
    {
        return view('livewire.car.book');
    }

    protected $rules = [
        'user.name' => 'required:string',
        'user.phone_number' => 'required:string',
        'user.email' => 'required:email',
    ];

    public function confirmBooking(){

        $this->validate();
        $this->parseBookingData();

        $mass_saver = new  MassSaver();
        $mass_saver->save($this->booking, new Booking);
        $this->booking = Booking::orderby('created_at', 'desc')->first();

        $this->emit('carBookingConfirmed');
        $this->dispatchBrowserEvent('success', ['message' => "Car rental confirmed succesfully"]);
        $this->attachPayment();
        return redirect()->route('bookings.show', $this->booking)->with(['status'=>'Car rental confirmed succesfully']);
    }

    protected function parseBookingData(){

        if (Auth::user()){
            $new_phone_number = $this->user->phone_number;
            $this->user = Auth::user();
            $this->user->phone_number = $new_phone_number;
            $this->booking->user_id = $this->user->id;
            $this->booking->user_information= $this->user->toJson();
        }else
        {
            $serialized_user = new User;
            $serialized_user->fill($this->user);
            $this->booking->user_information = $serialized_user;
        }
        $generator = new BookingGenerator;
        $this->booking->code  = $generator->generateBookingCode($this->car->id, get_class($this->car));

        $this->booking->bookable_id = $this->car->id;
        $this->booking->bookable_type = CarModel::class;
        $this->booking->bookable_url = route('cars.show',$this->car->id);

        $this->booking->bookable_information = $this->car->toJson();
        $this->booking->amount = $this->car->tax + $this->car->price ;
    }

    protected function attachPayment(){
        if($this->booking->payment) 
            return;
            
        $payment = new Payment();
        $generator = new PaymentGenerator;
        $payment->user_id = Auth::user()->id;
        $payment->transaction_reference = $generator->generatePaymentTransactionReference();
        $payment->paymentable_id = $this->booking->id;
        $payment->paymentable_type = Booking::class;
        $payment->paymentable_url = route('bookings.show', $this->booking->id);
        $payment->for = "Car Renting";
        $payment->amount = $this->booking->amount;

        $payment->save();
    }
}
