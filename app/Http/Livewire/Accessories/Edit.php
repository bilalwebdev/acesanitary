<?php

namespace App\Http\Livewire\Accessories;

use App\Models\Accessories;
use App\Models\HoseSize;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Edit extends Component
{

    public $module_name = 'accessories';
    public $accessory;
    public $allSizes;
    public $module_title = 'Accessories';
    public $module_action = 'Edit';

    public function mount($id)
    {
        $this->accessory = Accessories::find($id);
        $this->allSizes = HoseSize::all();
    }

    protected $rules = [
        'accessory.part_number' => 'required',
        'accessory.size' => 'required|regex:/[^A-Za-z][1-9]*\-?[1-9]*[\/]?[1-9]*/',
        'accessory.price' => 'required|numeric',
        'accessory.category' => 'required'
    ];

    public function update()
    {

        $this->validate();
        $this->accessory->update();
        flash("<i class='fas fa-check'></i> Accessory Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->accessory->id);
    }

    public function render()
    {
        return view('livewire.accessories.edit');
    }
}
