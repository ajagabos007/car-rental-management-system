<?php
namespace App\Rules;
use Spatie\Permission\Models\Permission;
class AssignPermissionRule {
    
   
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
        foreach (Permission::all() as $permission) {
            self::$validation_rules = array_merge(self::$validation_rules, ['permission_'.$permission->id => 'nullable|integer']);
        }       
    }   
   
}