<?php
namespace App\Rules;
use App\Models\User;
class AssignUserRule {
    
   
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
        foreach (User::all() as $user) {
            self::$validation_rules = array_merge(self::$validation_rules, ['user_'.$user->id => 'nullable|integer']);
        }       
    }   
   
}