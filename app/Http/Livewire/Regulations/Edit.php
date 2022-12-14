<?php

namespace App\Http\Livewire\Regulations;

use App\Models\Regulations;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{
    public $module_name = "regulations";
    public $regulation;
    public $module_title = 'Restrictions/Regulations';
    public $module_action = 'Edit';

    protected $rules = [
        'regulation.name' => 'required'
    ];

    public function mount($id)
    {
        $this->regulation = Regulations::find($id);
    }

    public function update()
    {
        $this->validate();

        $this->regulation->update();

        flash("<i class='fas fa-check'></i> Regulations/Restrictions Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->regulation->id);
    }
    public function render()
    {
        return view('livewire.regulations.edit');
    }
}
