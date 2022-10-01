<?php

namespace App\Http\Generators;

class BookingGenerator
{
    /**
     * Generate booking code.
     * using the APP_CODE , bookable id, bookable type and random generated time
     * @param int bookable_id
     * @param string bookable_type
     * @return string booking_code
     */
    public function generateBookingCode($bookable_id="BOOKABLE_ID", $bookable_type="BOOKABLE_TYPE"){
        $booking_code = env('APP_CODE', "KWT")."/".$bookable_type."/".$bookable_id."/".substr(rand(0,time()),0,8);
        return $booking_code;
    }


}
