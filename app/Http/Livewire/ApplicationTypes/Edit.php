<?php

namespace App\Http\Livewire\ApplicationTypes;

use App\Models\ApplicationType;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{
    public $module_name = "application-types";
    public $app_type;
    public $module_title = 'Application Types';
    public $module_action = 'Edit';

    protected $rules = [
        'app_type.name' => 'required'
    ];

    public function mount($id)
    {
        $this->app_type = ApplicationType::find($id);
    }

    public function update()
    {
        $this->validate();

        $this->app_type->update();

        flash("<i class='fas fa-check'></i> Application Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->app_type->id);
    }
    public function render()
    {
        return view('livewire.application-types.edit');
    }
}
