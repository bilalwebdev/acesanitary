<?php

namespace App\Http\Livewire\Regulations;

use App\Models\Regulations;
use Livewire\Component;

class Create extends Component
{
    public $module_name = "regulations";

    public $name;


    protected $rules = [
        'name' => 'required'
    ];

    public function store()
    {
        $this->validate();

        Regulations::create([
            'name' => $this->name
        ]);

        return redirect('admin/regulations/index');
    }
    public function render()
    {
        return view('livewire.regulations.create');
    }
}
