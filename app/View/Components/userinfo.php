<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class userinfo extends Component
{
    public $uid;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($uid)
    {
        $this->uid = $uid; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = User::find($this->uid);
        return view('components.userinfo',['user' => $user]);
    }
}
