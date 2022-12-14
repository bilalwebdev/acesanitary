<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteEntity extends Component
{

    public $id;
    public $module_name;
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public function __construct($id, $module)
    {

        // dd($module);
        $this->id = $id;
        $this->module_name = $module;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.deleteEntity');
    }
}
