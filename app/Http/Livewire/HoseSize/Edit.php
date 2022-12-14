<?php

namespace App\Http\Livewire\HoseSize;

use App\Models\HoseSize;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{
    public $module_name = "hose-size";
    public $hose_size;
    public $module_title = 'Hose Size';
    public $module_action = 'Edit';

    protected $rules = [
        'hose_size.size' => 'required|numeric'
    ];

    public function mount($id){
      $this->hose_size = HoseSize::find($id);
    }

    public function update(){
         $this->validate();

         $this->hose_size->update();

         flash("<i class='fas fa-check'></i> Hose Size Updated Successfully")->success()->important();

         Log::info(label_case($this->module_title.' '.$this->module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

         return redirect()->route("backend.$this->module_name.show", $this->hose_size->id);
    }
    public function render()
    {
        return view('livewire.hose-size.edit');
    }
}
