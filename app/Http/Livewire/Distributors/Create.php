<?php

namespace App\Http\Livewire\Distributors;

use App\Models\Distributor;
use Livewire\Component;

class Create extends Component
{
    public $module_name = "distributors";

    public $name;
    public $email;
    public $phone;
    public $site_url;
    public $distributor_margin;
    public $distributor_multiplier;
    public $status = 0;
    public $address;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:distributors|email:filter, rfc, spoof',
            'site_url' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'distributor_margin' => 'required|numeric',
            'distributor_multiplier' => 'required|numeric',
        ]);

        Distributor::create([
            'name' => $this->name,
            'email' => $this->email,
            'site_url' => $this->site_url,
            'phone' => $this->phone,
            'address' => $this->address,
            'distributor_margin' => $this->distributor_margin,
            'distributor_multiplier' => $this->distributor_multiplier,
            'status' => $this->status,
        ]);

        return redirect('admin/distributor/index');
    }


    public function render()
    {
        return view('livewire.distributors.create');
    }
}
