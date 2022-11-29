<?php

namespace App\View\Components;

use App\Models\House;
use Illuminate\View\Component;

class detailinfo extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        $house = House::find($this->id);
        return view('components.detailinfo', ['house' => $house]);
    }
}
