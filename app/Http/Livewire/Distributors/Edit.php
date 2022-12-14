<?php

namespace App\Http\Livewire\Distributors;

use App\Models\Distributor;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Edit extends Component
{
    public $distributor;

    public $module_name = "distributors";

    public $name;
    public $email;
    public $phone;
    public $site_url;
    public $distributor_margin;
    public $distributor_multiplier;
    public $status;
    public $address;
    public $module_action = 'Edit';
    public $module_title = 'Distributors';

    public function mount($id)
    {
        $this->distributor =  Distributor::find($id);
        $this->email = $this->distributor->email;
    }
    protected $rules = [
        'distributor.name' => 'required',
        'distributor.site_url' => 'required',
        'distributor.phone' => 'required|numeric',
        'distributor.address' => 'required',
        'distributor.distributor_margin' => 'required|numeric',
        'distributor.distributor_multiplier' => 'required|numeric',
        'distributor.status' => 'required',
    ];

    public function edit()
    {
        $this->validate([
            'email' =>  'required|unique:distributors,email,' . $this->distributor->id,
        ]);

        $this->distributor->update(
            [
                'email' => $this->email
            ]
        );


        flash("<i class='fas fa-check'></i> Distributor Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->distributor->id);
    }

    public function render()
    {
        return view('livewire.distributors.edit');
    }
}
