<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Amenity::factory()->count(5)->create();

        /**
         * @var $amenities
         */
        $amenities = [
            "Wi-Fi", 
            "Entertainment",
            "Air Conditioning", 
            "Drink",
            "Games",
            "Wines",
            "Shopping",
            "Food",
            "Comfort",
            "Magazines",
            "Swimming pool",
            "Coffee",
            "Fitness Facility",
            "Fridge",
            "Wine Bar",
            "Smoking Allowed",
            "Secure Vault",
            "Pick and Drop",
            "Room Service",
            "Pets Allowed",
            "Play Place",
            "Comp. Breakfast",
            "Free Parking",
            "Confrence Room",
            "Fire Place",
            "Handicap Accesible",
            "Doorman",
            "Hot Tub",
            "Elevator In Building",
            "Suitable for Events",
            "Television",
            "Automatic Transmission",
            "Satelite Navigation",
        ];

        foreach ($amenities as $key => $amenity) {
            $new_amenity = new Amenity();
            $new_amenity->name =  $amenity;
            $new_amenity->save();
        }
    
        
    }
}
