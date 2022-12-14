<?php

namespace App\Http\Livewire\Accessories;

use App\Models\Accessories;
use App\Models\HoseSize;
use Livewire\Component;

class Create extends Component
{

    public $module_name = 'accessories';

    public $part_number;
    public $size;
    public $category;
    public $allSizes;
    public $price;

    protected $rules = [
        'part_number' => 'required',
        'size' => 'required|regex:/[^A-Za-z][1-9]*\-?[1-9]*[\/]?[1-9]*/',
        'price' => 'required|numeric',
        'category' => 'required'
    ];

    public function mount()
    {
        $this->allSizes = HoseSize::all();
    }


    public function store()
    {
        $this->validate();

        Accessories::create([
            'part_number' => $this->part_number,
            'size' => $this->size,
            'price' => $this->price,
            'category' => $this->category
        ]);

        return redirect('admin/accessories/index');
    }


    public function render()
    {
        return view('livewire.accessories.create');
    }
}
