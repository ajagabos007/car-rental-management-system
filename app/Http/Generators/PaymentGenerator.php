<?php

namespace App\Http\Generators;

class PaymentGenerator
{
    /**
     * Generate booking code.
     * using the APP_CODE , bookable id, bookable type and random generated time
     * @param int bookable_id
     * @param string bookable_type
     * @return string booking_code
     */
    public function generatePaymentTransactionReference(){
        $transaction_reference = env('APP_CODE', "KWT")."/PYMNT/TRNRF/".substr(rand(0,time()),0,8);
        return $transaction_reference;
    }


}
