<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role;


class AssignRoleForm extends Component
{

   /**
     * The user.
     *
     * @var \App\Models\User $user
     */
    public $user;

    /**
     * The roles.
     *
     * @var \Spatie\Permission\Models\Role $roles
     */
    public $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->roles =Role::all()->sortBy('name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.assign-role-form');
    }
}
