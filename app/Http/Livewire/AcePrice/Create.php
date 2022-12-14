<?php

namespace App\Http\Livewire\AcePrice;

use App\Models\AcePrice;
use Livewire\Component;

class Create extends Component
{
    public $module_name = "ace-price";
    public $item;
    public $qty = 1;
    public $unit_price;
    public $unit_of_measure;
    public $description;
    public $bulk_price;
    public $bulk_unit_of_measure;
    public $coil_length;
    public $assembly_charge;
    public $factory_assembly = 0;
    public $net_price;


    protected $rules = [
        'item' => 'required',
        'qty' => 'required|numeric',
        'unit_price' => 'required|numeric',
        'unit_of_measure' => 'required',
        'description' => 'required',
        'bulk_price' => 'required|numeric',
        'bulk_unit_of_measure' => 'required',
        'coil_length' => 'required|numeric',
        'factory_assembly' => 'required',
        'net_price' => 'required|numeric',
    ];

    public function store()
    {
        $this->validate();

        AcePrice::create([
            'item' => $this->item,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'unit_of_measure' => $this->unit_of_measure,
            'description' => $this->description,
            'bulk_price' => $this->bulk_price,
            'bulk_unit_of_measure' => $this->bulk_unit_of_measure,
            'coil_length' => $this->coil_length,
            'assembly_charge' => $this->assembly_charge,
            'factory_assembly' => $this->factory_assembly,
            'net_price' => $this->net_price,
        ]);

        return redirect('admin/ace-price/index');
    }

    public function render()
    {
        return view('livewire.ace-price.create');
    }
}
