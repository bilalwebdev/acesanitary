<?php

namespace App\Http\Livewire\Hoses;

use App\Models\Accessories;
use App\Models\ApplicationType;
use App\Models\EndStyle;
use App\Models\Hose;
use App\Models\HoseSize;
use App\Models\Material;
use App\Models\Models;
use App\Models\Regulations;
use App\Models\Series;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use  Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $hose;

    public $module_name = "hoses";

    public $image;
    public $sizes;
    public $oldImage;
    public $materials;
    public $requirments;
    public $regulations;
    public $series;
    public $outer_diameter;
    public $module_action = 'Edit';
    public $module_title = 'Hoses';
    public $end_style_1 = [];
    public $end_style_2 = [];
    public $connection_size_1 = [];
    public $connection_size_2 = [];

    protected $rules = [
        'hose.model' => 'required',
        'hose.name' => 'required',
        'hose.series_id' => 'required',
        'hose.material_id' => 'required',
        'hose.inner_diameter' => 'required|regex:/[^A-Za-z][1-9]*\-?[1-9]*[\/]?[1-9]*/',
        'hose.app_type' => 'required',
        'hose.min_cleaning_temprature' => 'required|numeric',
        'hose.max_cleaning_temprature' => 'required|numeric',
        'hose.min_process_temprature' => 'required|numeric',
        'hose.max_process_temprature' => 'required|numeric',
        'hose.min_cleaning_pressure' => 'required|numeric',
        'hose.max_cleaning_pressure' => 'required|numeric',
        'hose.min_process_pressure' => 'required|numeric',
        'hose.max_process_pressure' => 'required|numeric',
        'hose.deration' => 'required|numeric',
        'hose.price' => 'required|numeric',
        'hose.full_coil_oal' => 'required',
        'hose.description' => 'required',
        'hose.factory_assembly' => 'required',
        'hose.unit_of_measure' => 'required',
        'hose.collar_id' => 'required',
        'hose.max_length' => 'required|numeric',
    ];

    public function mount($id)
    {
        $this->hose = Hose::find($id);
        $this->part_number = $this->hose->part_number;
        $this->requirments = json_decode($this->hose->requirments);
        $this->oldImage = $this->hose->image;
        $this->materials = Material::all();
        $this->models = Models::all();
        $this->series = Series::all();
        $this->sizes = HoseSize::all();
        $this->app_types = ApplicationType::all();
        $this->allRegulations =  Regulations::all();
        $this->end_styles = EndStyle::all();
        $this->collars = Accessories::where('category', 'Collar')->get();;
        $this->outer_diameter = $this->hose->outer_diameter;
        $this->endstyle1 = json_decode($this->hose->end_style_1);
        $this->endstyle2 = json_decode($this->hose->end_style_2);
        $this->connection_size_1 = json_decode($this->hose->connection_size_1);
        $this->connection_size_2 = json_decode($this->hose->connection_size_2);
        $this->regulations = json_decode($this->hose->regulations);
    }

    public function updatedImage($value, $key)
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048', // 2MB Max
        ]);

        Storage::delete('public/' . $this->oldImage);



        $this->hose->update(
            [
                'image' => $value->store('images', 'public'),

            ]
        );
    }

    public function update()
    {
        $this->validate();
        $this->validate([
            'part_number' => 'required|unique:hoses,part_number,' . $this->hose->id,
            'endstyle1' => 'required',
            'endstyle2' => 'required',
            'connection_size_1' => 'required',
            'connection_size_2' => 'required',
            'requirments' => 'required',
            'regulations' => 'required',
        ]);

        $this->hose->update(
            [
                'part_number' => $this->part_number,
                'requirments' => json_encode($this->requirments),
                'regulations' => json_encode($this->regulations),
                'outer_diameter' => $this->outer_diameter,
                'end_style_1' => json_encode($this->endstyle1),
                'end_style_2' => json_encode($this->endstyle2),
                'connection_size_1' => json_encode($this->connection_size_1),
                'connection_size_2' => json_encode($this->connection_size_2),
            ]
        );

        flash("<i class='fas fa-check'></i> Hose Updated Successfully")->success()->important();

        Log::info(label_case($this->module_title . ' ' . $this->module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return redirect()->route("backend.$this->module_name.show", $this->hose->id);
    }

    public function render()
    {
        $materials = Material::all();


        $series = Series::all();


        return view('livewire.hoses.edit', compact('materials', 'series'));
    }
}
