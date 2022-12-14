<?php

namespace App\Http\Livewire\Endstyles;

use App\Models\EndStyle;
use App\Models\HoseSize;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $module_name = "endstyles";

    public $name;
    public $image;
    public $model;
    public $allSizes;
    public $part_number;
    public $size;
    public $step_up_supported = 0;
    public $price;
    public $hose_sizes;

    protected $rules = [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
        'name' => 'required',
        'model' => 'required',
        'part_number' => 'required',
        'size' => 'required|regex:/[^A-Za-z][1-9]*\-?[1-9]*[\/]?[1-9]*/',
        'step_up_supported' => 'required',
        'price' => 'required|numeric'
    ];

    public function mount()
    {
        $this->hose_sizes = HoseSize::all();
    }

    public function store()
    {
        $this->validate();

        EndStyle::create([
            'name' => $this->name,
            'model' => $this->model,
            'part_number' => $this->part_number,
            'size' => $this->size,
            'step_up_supported' => $this->step_up_supported,
            'price' => $this->price,
            'image' =>  $this->image->store('images/endstyles', 'public')
        ]);

        return redirect('admin/endstyle/index');
    }

    public function render()
    {
        return view('livewire.endstyles.create');
    }
}
