<?php
namespace App\Http\Interfaces;
use App\Models\Payment;
use Illuminate\Http\Request;

interface PaymentInterface {
    public function pay();
    public function verify(Payment $payment, Request $request);
    // public function confirm();
    // public function cancel();
}