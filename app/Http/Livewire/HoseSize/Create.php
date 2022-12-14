<?php

namespace App\Http\Livewire\HoseSize;

use App\Models\HoseSize;
use Livewire\Component;

use function PHPUnit\Framework\returnSelf;

class Create extends Component
{
    public $module_name = "hose-size";
    public $size;

    protected $rules = [
        'size' => 'required|regex:/[^A-Za-z][1-9]*\-?[1-9]*[\/]?[1-9]*/'
    ];


    public function store()
    {
        $this->validate();

        HoseSize::create([
            'size' => $this->size
        ]);

        return redirect('admin/hose-size/index');
    }
    public function render()
    {
        return view('livewire.hose-size.create');
    }
}
