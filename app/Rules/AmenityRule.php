<?php
namespace App\Rules;
use App\Models\Amenity;
class AmenityRule {
    
   
    /**
    * The shop repository implementation.
    *
    * @var array
    */
    public static $validation_rules = [];
    
    /**
     * Create a new validation rules instance.
     *
     * @return void
     */

    public function __construct()
    {
        foreach (Amenity::all() as $amenity) {
            self::$validation_rules = array_merge(self::$validation_rules, ['amenity_'.$amenity->id => 'nullable|integer']);
        }       
    }   
   
}