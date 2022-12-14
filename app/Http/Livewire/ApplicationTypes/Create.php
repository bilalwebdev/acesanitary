<?php

namespace App\Http\Livewire\ApplicationTypes;

use App\Models\ApplicationType;
use Livewire\Component;

class Create extends Component
{
    public $module_name = 'application-types';

    public $name;


    protected $rules = [
        'name' => 'required'
    ];

    public function store()
    {
        $this->validate();

        ApplicationType::create([
            'name' => $this->name
        ]);

        return redirect('admin/application-types/index');
    }
    public function render()
    {
        return view('livewire.application-types.create');
    }
}
