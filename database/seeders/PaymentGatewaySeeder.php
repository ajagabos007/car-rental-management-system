<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentGateway;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        #<----- Flutterwave  ------>
        $flutterwave = new PaymentGateway();
        $flutterwave->name = "Flutterwave";
        $flutterwave->public_key = "FLWPUBK_TEST-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-X";
        $flutterwave->secret_key = "FLWSECK_TEST-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-X";
        $flutterwave->encryption_key = "FLWSECK_TESTxxxxxxxxxxxxx";
        $flutterwave->save();
        
        // PaymentGateway::factory()
        // ->count(3)
        // ->create();
    }
}
