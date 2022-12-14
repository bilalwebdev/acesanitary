<?php

namespace App\Http\Livewire\Models;

use App\Models\Models;
use Livewire\Component;

class Create extends Component
{
    public $module_name = "models";

    public $model;


    protected $rules = [
        'model' => 'required'
    ];

    public function store()
    {
        $this->validate();

        Models::create([
            'name' => $this->model
        ]);

        return redirect('admin/models/index');
    }

    public function render()
    {
        return view('livewire.models.create');
    }
}
