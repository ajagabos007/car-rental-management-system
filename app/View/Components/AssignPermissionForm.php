<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignPermissionForm extends Component
{
    /**
     * The user 
     * 
     * @var \App\Models\user $user
     */
    public $user;   
    

    /**
    * The permissions 
    * 
    * @var \Spatie\Permission\Models\Permission $permission
    */
    public $permissions; 


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user=NULL)
    {
        $this->user = $user; 
        $this->permissions = Permission::all()->sortBy('name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.assign-permission-form');
    }
}
