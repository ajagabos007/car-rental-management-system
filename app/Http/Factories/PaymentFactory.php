<?php
namespace App\Http\Factories;

namespace App\Http\Factories\PaymentFactory;

use App\Http\Gateways\Payment\Flutterwave;

class PaymentFactory{

    function __construct($gateway) {
        try {
            if ($gateway == "Flutterwave")
                dd("james");
                //return new Flutterwave();        
            else throw new Exception("Unknown Pament Gateway Error: The selected payment gateway is unkown.
            Please select another payment gateway and try again. 
            If this persist please contact MyEveryDeal support");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
