<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class CheckStaffForm extends Component
{
    /**
     * The user.
     *
     * @var \App\Models\User $user
     */
    public $user;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.check-staff-form');
    }
}
