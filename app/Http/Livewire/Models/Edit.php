<?php

namespace App\Http\Livewire\Models;

use App\Models\Models;
use Livewire\Component;
use Illuminate\Support\Facades\Log;


class Edit extends Component
{
    public $module_name = "models";
    public $model;
    public $module_title = 'Models';
    public $module_action = 'Edit';

    protected $rules = [
        'model.name' => 'required'
    ];

    public function mount($id)
    {
        $this->model = Models::find($id);
    }

    public function update()
    {
        $this->validate();

        $this->model->update();

        flash("<i class='fas fa-check'></i> Model Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->model->id);
    }

    public function render()
    {
        return view('livewire.models.edit');
    }
}
