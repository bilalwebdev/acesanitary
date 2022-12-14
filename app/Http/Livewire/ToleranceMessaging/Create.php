<?php

namespace App\Http\Livewire\ToleranceMessaging;

use App\Models\ToleranceMessaging;
use Livewire\Component;

class Create extends Component
{
    public $module_name = "tolerance-messaging";
    public $message;

    protected $rules = [
        'message' => 'required'
    ];


    public function store()
    {
        $this->validate();

        ToleranceMessaging::create([
            'message' => $this->message
        ]);

        return redirect('admin/tolerance-messaging/index');
    }
    public function render()
    {
        return view('livewire.tolerance-messaging.create');
    }
}
