<?php

namespace App\View\Components;

use Illuminate\View\Component;
Use Spatie\Permission\Models\Role;
Use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleForm extends Component
{
      /**
    * The role 
    * 
    * @var \App\Models\User $user
    */
    public $users; 

    /**
    * The role 
    * 
    * @var \App\Models\Role $role
    */
    public $role; 

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
    public function __construct($role=NULL)
    {
        $this->role = $role;
        $this->permissions = Permission::all()->sortBy('name');
        $this->users = User::all()->sortBy('name');

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.role-form');
    }
}
