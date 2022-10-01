<?php
namespace App\Rules;
use Spatie\Permission\Models\Role;

class AssignRoleRule {
    
   
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
        foreach (Role::all() as $role) {
            self::$validation_rules = array_merge(self::$validation_rules, ['role_'.$role->id => 'nullable|integer']);
        }       
    }   
   
}