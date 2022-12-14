<?php

namespace App\Http\Livewire\AcePrice;

use App\Models\AcePrice;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{

    public $module_name = "ace-price";
    public $module_action = 'Edit';
    public $module_title = 'Ace Price';
    public $ace_price;

    public function mount($id)
    {
        $this->ace_price = AcePrice::find($id);
        $this->assembly_charge = $this->ace_price->assembly_charge;
    }


    protected $rules = [

        'ace_price.item' => 'required',
        'ace_price.qty' => 'required|numeric',
        'ace_price.unit_price' => 'required|numeric',
        'ace_price.unit_of_measure' => 'required',
        'ace_price.description' => 'required',
        'ace_price.bulk_price' => 'required|numeric',
        'ace_price.bulk_unit_of_measure' => 'required',
        'ace_price.coil_length' => 'required|numeric',
        'ace_price.factory_assembly' => 'required',
        'ace_price.net_price' => 'required|numeric',
    ];


    public function update()
    {

        $this->validate();

        $this->ace_price->update([
            'assembly_charge' => $this->assembly_charge
        ]);

        flash("<i class='fas fa-check'></i> Ace Price Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.index");
    }



    public function render()
    {
        return view('livewire.ace-price.edit');
    }
}
