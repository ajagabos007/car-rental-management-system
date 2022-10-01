<?php
namespace App\Http\Gateways;

use App\Http\Interfaces\PaymentInterface;
use App\Models\Payment;
use Illuminate\Http\Request;


class FlutterwaveGateway implements PaymentInterface {
    
    public function pay(){

    }

    public function verify(Payment $payment, Request $request){
         
        // http://127.0.0.1:8000/payments/7/verify?status=successful&tx_ref=KWT%2FPYMNT%2FTRNRF%2F76166552&transaction_id=3590379
        

        $payment = Payment::where('transaction_reference', $request->tx_ref)->first();

        $payment->transaction_id = $request->transaction_id;
        $payment->save();
 
        //verifying the payment
        $curl = curl_init();
 
        curl_setopt_array($curl, array(

             CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$request->transaction_id."/verify",
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => "",
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_TIMEOUT => 0,
             CURLOPT_FOLLOWLOCATION => true,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET",
             CURLOPT_HTTPHEADER => array(
                 "Content-Type: application/json",
                 "Authorization: Bearer ".env('FLUTTERWAVE_SECRET_KEY')
            ),
        ));
 
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
 
        if (is_null($response))
            return false;
        if($response->data->status == "successful" 
            && $response->data->tx_ref == $payment->transaction_reference
            && $response->data->charged_amount >= $payment->amount
            && $response->data->currency =="NGN"){
 
            $payment->type = $response->data->payment_type;
            $payment->paid_on = now(); //$response->data->created_at;
            $payment->status = $response->data->status;
            $payment->verified_on = now();
            $payment->save();
            
            return true;
        }
        else{
            $payment->status = $response->data->status;
            return false;
        }
    }
}