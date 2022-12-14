<?php

namespace App\Http\Livewire\ToleranceMessaging;

use App\Models\ToleranceMessaging;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Edit extends Component
{

    public $module_name = "tolerance-messaging";
    public $tolerance_message;
    public $module_title = 'Tolerance Messaging';
    public $module_action = 'Edit';

    protected $rules = [
        'tolerance_message.message' => 'required'
    ];

    public function mount($id)
    {
        $this->tolerance_message = ToleranceMessaging::find($id);
    }

    public function update()
    {
        $this->validate();

        $this->tolerance_message->update();

        flash("<i class='fas fa-check'></i> Tolerance Message Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->tolerance_message->id);
    }

    public function render()
    {
        return view('livewire.tolerance-messaging.edit');
    }
}
