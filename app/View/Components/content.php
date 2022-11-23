<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\House;
use Illuminate\Http\Request; 

class content extends Component
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
        if($this->id == 0){
            $houses = House::orderBy('create_at','desc')->paginate(5);
        }
        else{
            $houses = House::where('_category_id',$this->id)->orderBy('create_at','desc')->paginate(5);
        }
        // var_dump($houses->province->_name);
        // die();
        //$houses = House::orderBy('created_at','desc')->get();
        //$house1 = Post::find('1')->house;
        return view('components.content', ['houses' => $houses]);
    }
}
