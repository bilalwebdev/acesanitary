<?php

namespace App\Http\Livewire\Endstyles;

use App\Models\EndStyle;
use App\Models\HoseSize;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{

    public $endstyle;
    public $oldImage;
    public $image;
    public $allSizes;
    public $module_title = 'End Styles';
    public $module_name = 'endstyles';
    public $module_action = 'Edit';

    use WithFileUploads;


    protected $rules = [
       // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
        'endstyle.model' => 'required',
        'endstyle.name' => 'required',
        'endstyle.part_number' => 'required',
        'endstyle.size' => 'required|regex:/[^A-Za-z][1-9]*\-?[1-9]*[\/]?[1-9]*/',
        'endstyle.step_up_supported' => 'required',
        'endstyle.price' => 'required|numeric',
    ];

    public function mount($id)
    {
        $this->endstyle = EndStyle::find($id);
        $this->oldImage = $this->endstyle->image;
        $this->allSizes = HoseSize::all();
    }


    public function updatedImage($value, $key)
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
        ]);

        Storage::delete('public/' . $this->oldImage);

        $this->endstyle->update(
            [
                'image' => $value->store('images/endstyles', 'public')
            ]
        );
    }

    public function edit()
    {
            $this->validate();


        $this->endstyle->update();


        flash("<i class='fas fa-check'></i> End Style Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->endstyle->id);
    }
    public function render()
    {
        return view('livewire.endstyles.edit');
    }
}
